<?php

use app\models\GeneralModel;
use kartik\editors\Codemirror;
use kartik\file\FileInput;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var app\models\Page $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'visible')->dropDownList(GeneralModel::getYesNoOptions())
        ->hint('Выберите будет ли элемент выводится на сайте') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'slug')->textInput(['maxlength' => true])
        ->hint('На английском языке (можно транслитом) указать адрес, по которому будет доступна страница Пробелы между словами заменять на тире. Пример: заголовок: Условия доставки. Url: uslovia-dostavki') ?>
        <?php //->hint('Уникальный адрес, по которому можно попасть на страницу. Если оставить пустым, то будет сгенерирован автоматически') ?>

    <div class="container" style="margin-left: 0; padding-left: 0">
    <?= $form->field($model, 'content')->widget(\vova07\imperavi\Widget::class, [
        'settings' => Yii::$app->params['imperavi-redactor-settings'],
    ]) ?>
    </div>


    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'seo_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
