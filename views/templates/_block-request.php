<?php

use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

/**
 * @var \yii\web\View $this
 */



$message = new \app\models\Message();

?>

<section class="request">
    <div class="container">
        <div class="request__wrap" style="background-image: url('/images/request.jpg')">
            <div class="request__title">
                <h2 class="">Сделай заявку <br> прямо сейчас</h2>
            </div>

            <?php $form = ActiveForm::begin([
                'action' => Url::to(['/message/message']),
                'method' => 'POST',
                'options' => [
                    'class' => 'request__form request-form form-line no-labels form-inline',
                ],
            ]) ?>
            <?= $form->field($message, 'check', [
                'template' => '{input}',
                'options' => [
                    'class' => '',
                ],
            ])->hiddenInput(['class' => 'shield', 'value' => $message->check ? : 0])->label(false) ?>

            <?= $form->field($message, 'name', [
                'options' => [
                    'class' => 'form-group',
                ],
            ])->textInput([
                'placeholder' => 'Имя',
            ])->label(false) ?>

            <?= $form->field($message, 'phone', [
                'options' => [
                    'class' => 'form-group',
                ],
            ])->textInput([
                'placeholder' => 'Телефон',
                'class' => 'form-control phone-mask shield-start'
            ])->label(false) ?>

            <button type="submit" class="btn btn-call">Отправить</button>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</section>