<?php

return array(
    # definir e gerenciar controllers
    'controllers' => array(
        'invokables' => array(
            'HomeController' => 'Contato\Controller\HomeController',
            'ContatosController' => 'Contato\Controller\ContatosController',
        ),
    ),
    # definir e gerenciar rotas
    'router' => array(
        'routes' => array(
            # literal para action index home
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'HomeController',
                        'action' => 'index',
                    ),
                ),
            ),
            'contatos' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/contatos[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ContatosController',
                        'action' => 'index',
                    ),
                ),
            ),
            # literal para action sobre home
            'sobre' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/sobre',
                    'defaults' => array(
                        'controller' => 'HomeController',
                        'action' => 'sobre',
                    ),
                ),
            ),
        ),
    ),
    # definir e gerenciar servicos
    'service_manager' => array(
        'factories' => array(
        #'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    # definir e gerenciar layouts, erros, exceptions, doctype base
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'contato/home/index' => __DIR__ . '/../view/contato/home/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
