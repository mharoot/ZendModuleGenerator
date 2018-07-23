<?php
namespace Shipper; 
use Zend\Router\Http\Segment;
// use Zend\ServiceManager\Factory\InvokableFactory;

return [ 
   /*'controllers' => [
    'factories' => [ 
            Controller\ShipperController::class => InvokableFactory::class, 
        ],
    ],*/
    'router' => [ 
            'routes' => [
                'shipper' => [ 
                    'type' => Segment::class, 
                    'options' => [ 
                        'route' => '/shipper[/:action[/:id]]', 
                        'constraints' => [ 
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*', 
                            'id' => '[0-9]+', 
                        ], 
                        'defaults' => [ 
                            'controller' => Controller\ShipperController::class,
                            'action' => 'index', 
                        ], 
                    ], 
                ], 
            ], 
        ],
    'view_manager' => [
        'template_path_stack' => [ 
            'shipper' => __DIR__ . '/../view', 
 		],
    ],
    'db' => [
        'driver'  => 'Pdo',
        'dsn'     => 'mysql:dbname=emvc;host=localhost;charset=utf8',
        'username'=> 'root',
        'password'=> 'password',
    ],
];