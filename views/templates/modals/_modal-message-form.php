<?php

use app\models\Message;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$message = new Message();

?>

<!-- Modal -->
<div class="modal fade" id="modalTest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Оставить заявку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin([
                    'action' => Url::to(['/message/message']),
                    'method' => 'POST',
                    'options' => [
                        'class' => 'form-modal-call form-default',
                    ],
                ]) ?>
                    <?= $form->field($message, 'check', [
                        'template' => '<div class="form-group">{input}</div>'
                    ])->hiddenInput(['class' => 'shield', 'value' => $message->check ? : 0])->label(false) ?>
                    <?= $form->field($message, 'name')->textInput([
                        'placeholder' => 'Имя',
                    ])->label(false) ?>
                    <?= $form->field($message, 'phone')->textInput([
                        'placeholder' => 'Телефон',
                        'class' => 'form-control phone-mask shield-start'
                    ])->label(false) ?>
                    <?= $form->field($message, 'message')->textarea([
                        'placeholder' => 'Ваши пожелания',
                        'rows' => 4,
                    ])->label(false) ?>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-call_grey" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-call">Отправить</button>
                    </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>
