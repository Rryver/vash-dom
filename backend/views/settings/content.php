<?php

use app\backend\models\settings\SettingsContentForm;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

/* @var $model \app\backend\models\settings\SettingsConfigurationForm */
/* @var $this \yii\web\View */

$this->title = 'Настройки приложения';

$this->params['breadcrumbs'][] = ['label' => $this->title];

?>


    <div class="container" style="margin-top: 10px">
        <h2>Настройки </h2>

        <?php $form = ActiveForm::begin([
            'action' => Url::to(['/admin/settings/' . SettingsContentForm::getActionName()]),
        ]); ?>

        <?php echo $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
            'mask' => '+7 (999) 999-99-99',
        ]); ?>
        <?php echo $form->field($model, 'email'); ?>
        <?php echo $form->field($model, 'address'); ?>
        <?php echo $form->field($model, 'workTime'); ?>
        <?= $form->field($model, 'contactText')->widget(\vova07\imperavi\Widget::class, [
            'settings' => Yii::$app->params['imperavi-redactor-settings'],
        ]) ?>
        <?= $form->field($model, 'blockAboutText')->widget(\vova07\imperavi\Widget::class, [
            'settings' => Yii::$app->params['imperavi-redactor-settings'],
        ]) ?>

        <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>


