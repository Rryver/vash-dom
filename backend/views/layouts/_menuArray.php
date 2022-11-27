<?php

$controllerId = Yii::$app->controller->id;

return [
    [
        'label' => 'Default',
        'url' => '/admin/default',
        'active' => ($controllerId == 'default')
    ],
    [
        'label' => 'Products',
        'url' => '/admin/product',
        'active' => ($controllerId == 'product')
    ],
    [
        'label' => 'Dropdown',
        'items' => [
            [
                'label' => 'Products',
                'url' => '/admin/product',
                'active' => ($controllerId == 'default')
            ],
            [
                'label' => 'Products',
                'url' => '/admin/product',
//        'active' => ($controllerId = 'default')
            ],
        ]
    ],
];