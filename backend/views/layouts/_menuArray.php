<?php

$controllerId = Yii::$app->controller->id;

return [
    [
        'label' => 'Заявки',
        'url' => '/admin/message',
        'active' => ($controllerId == 'message')
    ],
    [
        'label' => 'Заявки на акции',
        'url' => '/admin/message-promo',
        'active' => ($controllerId == 'message-promo')
    ],
    [
        'label' => 'Наши работы',
        'url' => '/admin/projects',
        'active' => ($controllerId == 'projects')
    ],
    [
        'label' => 'Акции',
        'url' => '/admin/promo',
        'active' => ($controllerId == 'promo')
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