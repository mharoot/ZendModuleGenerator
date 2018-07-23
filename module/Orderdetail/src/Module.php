<?php
namespace Orderdetail;

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
					Model\OrderdetailTable::class => function($container) {
						$tableGateway = $container->get(Model\OrderdetailTableGateway::class);
						return new Model\OrderdetailTable($tableGateway);
					},
					Model\OrderdetailTableGateway::class => function ($container) {
						$dbAdapter = $container->get(AdapterInterface::class);
						$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new Model\Orderdetail());
						$tableName = 'orderdetail';
						return new TableGateway($tableName, $dbAdapter, null, $resultSetPrototype);
					},
				]
		];
    }
	
	public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\OrderdetailController::class => function($container) {
                    return new Controller\OrderdetailController(
                        $container->get(Model\OrderdetailTable::class)
                    );
                },
            ],
        ];
    }
}