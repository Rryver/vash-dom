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

    <?= $form->field($model, 'visible')->dropDownList(GeneralModel::getYesNoOptions()) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'slug')->textInput(['maxlength' => true])
        ->hint('Уникальный адрес, по которому можно попасть на страницу. Если оставить пустым, то будет сгенерирован автоматически') ?>

    <div class="container" style="margin-left: 0; padding-left: 0">
    <?= $form->field($model, 'content')->widget(\vova07\imperavi\Widget::class, [
        'settings' => Yii::$app->params['imperavi-redactor-settings'],
    ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
