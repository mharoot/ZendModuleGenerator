<?php
namespace Customer;

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
					Model\CustomerTable::class => function($container) {
						$tableGateway = $container->get(Model\CustomerTableGateway::class);
						return new Model\CustomerTable($tableGateway);
					},
					Model\CustomerTableGateway::class => function ($container) {
						$dbAdapter = $container->get(AdapterInterface::class);
						$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new Model\Customer());
						$tableName = 'customer';
						return new TableGateway($tableName, $dbAdapter, null, $resultSetPrototype);
					},
				]
		];
    }
	
	public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\CustomerController::class => function($container) {
                    return new Controller\CustomerController(
                        $container->get(Model\CustomerTable::class)
                    );
                },
            ],
        ];
    }
}