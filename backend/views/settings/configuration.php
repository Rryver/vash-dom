<?php

use app\backend\models\settings\SettingsConfigurationForm;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $model SettingsConfigurationForm */
/* @var $this \yii\web\View */

$this->title = 'Настройки приложения';

$this->params['breadcrumbs'][] = ['label' => $this->title];

?>


    <div class="container" style="margin-top: 10px">
        <h2>Настройки </h2>

        <?php $form = ActiveForm::begin([
            'action' => \yii\helpers\Url::to(['/admin/settings/' . SettingsConfigurationForm::getActionName()]),
        ]); ?>
        <?= $form->field($model, 'appName'); ?>

        <?= $form->field($model, 'adminEmail')
            ->hint('Почта, на которую будут отправляться уведомления о новых заявках'); ?>

        <?= $form->field($model, 'privacyPolicyLink')?>

        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>


