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
        <?php echo $form->field($model, 'appName'); ?>

        <?php echo $form->field($model, 'adminEmail'); ?>

        <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>


