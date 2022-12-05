<?php

/** @var yii\web\View $this */

use app\backend\models\settings\SettingsContentForm;
use app\backend\models\settings\SettingsSeoForm;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$message = new \app\models\Message();
$this->title = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'contactsPageTitle');
$keywords = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'contactsPageKeywords');
$description = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'contactsPageDescription');
$phone = Yii::$app->settings->get(SettingsContentForm::getSection(), 'phone');
$email = Yii::$app->settings->get(SettingsContentForm::getSection(), 'email');
$address = Yii::$app->settings->get(SettingsContentForm::getSection(), 'address');
$contactText = Yii::$app->settings->get(SettingsContentForm::getSection(), 'contactText');

if ($keywords) {
    $this->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
}

if ($description) {
    $this->registerMetaTag(['name' => 'description', 'content' => $description]);
}

?>

<section class="contacts-page m-t-40">
    <div class="container">
        <div class="contacts-page__header section-header">
            <h2 class="">Контакты</h2>
        </div>
        <div class="contacts-page__content m-t-30">
            <div class="contacts-page__flex-wrap">
                <div class="contacts-page__info col-12 col-md-6">
                    <?php if ($contactText) { ?>
                    <div class="contacts-page__text">
                        <?= $contactText ?>
                    </div>
                    <?php } ?>
                    <div class="contacts-page__contacts contacts-list">
                        <?php if ($phone) { ?>
                            <a class="contacts-list__item link-text" href="tel:<?= $phone ?>">
                                <img class="contacts-item-icon map-icon" src="images/icons/phone-call-black.svg" alt="">
                                <?= $phone ?>
                            </a>
                        <?php } ?>
                        <?php if ($email) { ?>
                            <a class="contacts-list__item link-text" href="mailto:<?= $email ?>">
                                <img class="contacts-item-icon map-icon" src="images/icons/email.svg" alt="">
                                <?= $email ?>
                            </a>
                        <?php } ?>
                        <?php if ($address) { ?>
                            <address class="contacts-list__item contacts-address link-text">
                                <img class="contacts-item-icon map-icon" src="images/icons/map-marker-svgrepo-com.svg" alt="">
                                <?= $address ?>
                            </address>
                        <?php } ?>
                    </div>
                </div>

                <div class="contacts-page__form-wrap col-12 col-md-6">
                    <?php $form = ActiveForm::begin([
                        'action' => Url::to(['/message/message']),
                        'method' => 'POST',
                        'options' => [
                            'class' => 'form-default form-contacts',
                        ],
                    ]) ?>
                        <span class="form-contacts__title">Напишите нам</span>
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
                            'placeholder' => 'Ваш вопрос',
                            'rows' => 4,
                        ])->label(false) ?>

                    <div class="text-align-right">
                        <button type="submit" class="btn btn-call">Отправить</button>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</section>
