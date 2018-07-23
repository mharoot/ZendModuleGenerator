<?php
namespace Shipper;

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
					Model\ShipperTable::class => function($container) {
						$tableGateway = $container->get(Model\ShipperTableGateway::class);
						return new Model\ShipperTable($tableGateway);
					},
					Model\ShipperTableGateway::class => function ($container) {
						$dbAdapter = $container->get(AdapterInterface::class);
						$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new Model\Shipper());
						$tableName = 'shipper';
						return new TableGateway($tableName, $dbAdapter, null, $resultSetPrototype);
					},
				]
		];
    }
	
	public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\ShipperController::class => function($container) {
                    return new Controller\ShipperController(
                        $container->get(Model\ShipperTable::class)
                    );
                },
            ],
        ];
    }
}