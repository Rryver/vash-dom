<?php

use app\models\GeneralModel;
use kartik\file\FileInput;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Project $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'imageFile')->widget(FileInput::class, [
        'options' => [
            'accept' => 'image/*'
        ],
    ]); ?>
    <?= $form->field($model, 'visible')->dropDownList(GeneralModel::getYesNoOptions()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
