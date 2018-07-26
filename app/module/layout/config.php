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
                ]

        ],

    ],
];