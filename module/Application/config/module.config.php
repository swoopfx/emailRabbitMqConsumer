<?php

declare(strict_types=1);

namespace Application;

use Application\Controller\Consumer;
use Application\Controller\Factory\ConsumerFactory;
use Application\Controller\Factory\IndexControllerFactory;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    // 'laminas-cli'=>[
    //     'commands' => [
    //         // ...
    //         'app:hello-world' => Controller\IndexController::class
    //         // ...
    //     ],

    // ],

    // 'console' => [
    //     'router' => [
    //         'routes' => [
    //             'home' => [
    //                             'type'    => Literal::class,
    //                             'options' => [
    //                                 'route'    => '/',
    //                                 'defaults' => [
    //                                     'controller' => Application\Controller\Index::class,
    //                                     'action'     => 'index',
    //                                 ],
    //                             ],
    //                         ],
    //             'user-reset-password' => [
    //                 'options' => [
    //                     'route'    => 'user resetpassword [--verbose|-v] <userEmail>',
    //                     'defaults' => [
    //                         'controller' => Application\Controller\Index::class,
    //                         'action'     => 'resetpassword',
    //                     ],
    //                 ],
    //             ]
    //         ],
    //     ],
    // ],
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            // 'application' => [
            //     'type'    => Segment::class,
            //     'options' => [
            //         'route'    => '/application[/:action]',
            //         'defaults' => [
            //             'controller' => Controller\IndexController::class,
            //             'action'     => 'index',
            //         ],
            //     ],
            // ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => IndexControllerFactory::class,
        ],
    ],
    "service_manager"=>[
        "factories"=>[
            Consumer::class=>ConsumerFactory::class
        ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'rabbitmq' => [
        'consumer' => [
            'login-trig' => [
                'description' => 'Consumer description',
                'connection' => 'default', // the connection name
                'exchange' => [
                    'type' => 'direct',
                    'name' => 'imappv2'
                ],
                'queue' => [
                    'name' => 'email-imapp', // can be an empty string,
                    'routing_keys' => [
                        // optional routing keys
                    ]
                ],
                'auto_setup_fabric_enabled' => true, // auto-setup exchanges and queues
                'qos' => [
                    // optional QOS options for RabbitMQ
                    'prefetch_size' => 0,
                    'prefetch_count' => 1,
                    'global' => false
                ],
                'callback' => Consumer::class,
            ]
        ]
    ]
];
