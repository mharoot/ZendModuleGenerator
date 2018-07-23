<?php
namespace Supplier; 
use Zend\Router\Http\Segment;
// use Zend\ServiceManager\Factory\InvokableFactory;

return [ 
   /*'controllers' => [
    'factories' => [ 
            Controller\SupplierController::class => InvokableFactory::class, 
        ],
    ],*/
    'router' => [ 
            'routes' => [
                'supplier' => [ 
                    'type' => Segment::class, 
                    'options' => [ 
                        'route' => '/supplier[/:action[/:id]]', 
                        'constraints' => [ 
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*', 
                            'id' => '[0-9]+', 
                        ], 
                        'defaults' => [ 
                            'controller' => Controller\SupplierController::class,
                            'action' => 'index', 
                        ], 
                    ], 
                ], 
            ], 
        ],
    'view_manager' => [
        'template_path_stack' => [ 
            'supplier' => __DIR__ . '/../view', 
 		],
    ],
    'db' => [
        'driver'  => 'Pdo',
        'dsn'     => 'mysql:dbname=emvc;host=localhost;charset=utf8',
        'username'=> 'root',
        'password'=> 'password',
    ],
];