<?php

use app\backend\models\settings\SettingsContentForm;

$controllerId = Yii::$app->controller->id;
$actionId = Yii::$app->controller->action->id;

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
        'label' => 'Главный слайдер',
        'url' => '/admin/main-slide',
        'active' => ($controllerId == 'main-slide')
    ],
    [
        'label' => 'Как мы работаем',
        'url' => '/admin/step',
        'active' => ($controllerId == 'step')
    ],
    [
        'label' => 'Информация',
        'url' => '/admin/settings/settings-content',
        'active' => ($controllerId == 'settings' && $actionId == SettingsContentForm::getActionName())
    ],
];