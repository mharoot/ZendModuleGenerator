<?php
namespace Employee; 
use Zend\Router\Http\Segment;
// use Zend\ServiceManager\Factory\InvokableFactory;

return [ 
   /*'controllers' => [
    'factories' => [ 
            Controller\EmployeeController::class => InvokableFactory::class, 
        ],
    ],*/
    'router' => [ 
            'routes' => [
                'employee' => [ 
                    'type' => Segment::class, 
                    'options' => [ 
                        'route' => '/employee[/:action[/:id]]', 
                        'constraints' => [ 
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*', 
                            'id' => '[0-9]+', 
                        ], 
                        'defaults' => [ 
                            'controller' => Controller\EmployeeController::class,
                            'action' => 'index', 
                        ], 
                    ], 
                ], 
            ], 
        ],
    'view_manager' => [
        'template_path_stack' => [ 
            'employee' => __DIR__ . '/../view', 
 		],
    ],
    'db' => [
        'driver'  => 'Pdo',
        'dsn'     => 'mysql:dbname=emvc;host=localhost;charset=utf8',
        'username'=> 'root',
        'password'=> 'password',
    ],
];