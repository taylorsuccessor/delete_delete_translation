<?php
return [
    'admin_menu'=>[

        [
            'route' => 'admin.user.index',
            'title' => 'setting',
            'icon' => 'fa  fa-shopping-cart',
            'subMenus' => [


                [
                    'route' => 'admin.car.index',
                    'title' => 'car',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?',
                ],

                [
                    'route' => 'admin.user.index',
                    'title' => 'user',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'',
                ],
                [
                    'route' => 'admin.role.index',
                    'title' => 'role',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'',
                ],
                [
                    'route' => 'admin.notification.index',
                    'title' => 'notification',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'',
                ],
                [
                    'route' => 'admin.edit_config.create',
                    'title' => 'setting',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'',
                ],
                [
                    'route' => 'admin.user_notification.index',
                    'title' => 'user_notification',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'',
                ],
                [
                    'route' => 'admin.upload_file.index',
                    'title' => 'upload_file',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?',
                ],
                [
                    'route' => 'admin.system_localization.index',
                    'title' => 'system_localization',
                    'icon' => 'fa fa-gears',
                    'parameter'=>'?',
                ],
            ],


        ],

        [
            'route' => 'admin.hyperpay.index',
            'title' => 'setting',
            'icon' => 'fa fa-credit-card',
            'subMenus' =>
                [
                    [
                        'route' => 'admin.hyperpay.index',
                        'title' => 'hyperpay',
                        'icon' => 'fa fa-gears',
                        'parameter'=>'?',
                    ],
                ]

        ],

    ],
];