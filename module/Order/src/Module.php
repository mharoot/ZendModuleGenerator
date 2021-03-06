<?php
namespace Order;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig() {
		return [ 'factories' => [
					Model\OrderTable::class => function($container) {
						$tableGateway = $container->get(Model\OrderTableGateway::class);
						return new Model\OrderTable($tableGateway);
					},
					Model\OrderTableGateway::class => function ($container) {
						$dbAdapter = $container->get(AdapterInterface::class);
						$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new Model\Order());
						$tableName = 'order';
						return new TableGateway($tableName, $dbAdapter, null, $resultSetPrototype);
					},
				]
		];
    }
	
	public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\OrderController::class => function($container) {
                    return new Controller\OrderController(
                        $container->get(Model\OrderTable::class)
                    );
                },
            ],
        ];
    }
}