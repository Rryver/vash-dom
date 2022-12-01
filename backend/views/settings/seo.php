<?php

use app\backend\models\settings\SettingsSeoForm;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

/* @var $model \app\backend\models\settings\SettingsConfigurationForm */
/* @var $this \yii\web\View */

$this->title = 'Настройки приложения';

$this->params['breadcrumbs'][] = ['label' => $this->title];

?>


    <div class="container" style="margin-top: 10px">
        <h2>Настройки SEO</h2>

        <?php $form = ActiveForm::begin([
            'action' => Url::to(['/admin/settings/' . SettingsSeoForm::getActionName()]),
        ]); ?>
        <?php echo $form->field($model, 'homePageTitle'); ?>
        <?php echo $form->field($model, 'homePageKeywords'); ?>
        <?php echo $form->field($model, 'homePageDescription'); ?>

        <?php echo $form->field($model, 'promoPageTitle'); ?>
        <?php echo $form->field($model, 'promoPageKeywords'); ?>
        <?php echo $form->field($model, 'promoPageDescription'); ?>

        <?php echo $form->field($model, 'projectsPageTitle'); ?>
        <?php echo $form->field($model, 'projectsPageKeywords'); ?>
        <?php echo $form->field($model, 'projectsPageDescription'); ?>

        <?php echo $form->field($model, 'contactsPageTitle'); ?>
        <?php echo $form->field($model, 'contactsPageKeywords'); ?>
        <?php echo $form->field($model, 'contactsPageDescription'); ?>

        <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>


