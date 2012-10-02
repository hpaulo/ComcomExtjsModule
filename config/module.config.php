<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'install_extjs' => 'ComcomExtjsModule\Console\InstallExtjs'
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'install-extjs' => array(
                    'type' => 'simple',
                    'options' => array(
                        'route'    => 'extjs install',
                        'defaults' => array(
                            'controller' => 'install_extjs',
                            'action'     => 'install'
                        )
                    )
                ),
            ),
        ),
    ),
);