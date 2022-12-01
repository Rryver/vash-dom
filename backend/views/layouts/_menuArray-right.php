<?php

use app\backend\models\settings\SettingsConfigurationForm;
use app\backend\models\settings\SettingsSeoForm;
use yii\helpers\Html;

$controllerId = Yii::$app->controller->id;
$actionId = Yii::$app->controller->action->id;

return [
    [
        'label' => 'Настройки',
        'items' => [
            [
                'label' => 'Системные',
                'url' => '/admin/settings/settings-configurations',
                'active' => ($controllerId == 'settings' && $actionId == SettingsConfigurationForm::getActionName())
            ],
            [
                'label' => 'SEO',
                'url' => '/admin/settings/settings-seo',
                'active' => ($controllerId == 'settings' && $actionId == SettingsSeoForm::getActionName())
            ],
        ]
    ],
    '<li class="nav-item">'
    . Html::beginForm(['/user/logout'], 'post', ['class' => 'form-inline'])
    . Html::submitButton(
        'Выйти',
        ['class' => 'btn nav-link logout']
    )
    . Html::endForm()
    . '</li>',
];