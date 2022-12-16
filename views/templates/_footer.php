<?php

use app\backend\models\settings\SettingsContentForm;

$phone = Yii::$app->settings->get(SettingsContentForm::getSection(), 'phone');
$email = Yii::$app->settings->get(SettingsContentForm::getSection(), 'email');
$workTime = Yii::$app->settings->get(SettingsContentForm::getSection(), 'workTime');

?>

<?php
//TODO Изменить height:unset в .less файле. Сейчас измеено руками в main.css
//TODO Настроить gulp
?>
<footer class="footer">
    <div class="footer__content">
        <a class="footer__logo" href="/">
            <img class="logo" src="/images/logo.svg" alt="logo">
        </a>

        <?php if ($workTime) { ?>
            <div class="footer__text">Консультации по телефону: <?= $workTime ?></div>
        <?php } ?>
        <?php if ($phone) { ?>
            <div class="footer__text">
                <a class="link-text link-phone" href="tel:<?= $phone ?>"><?= $phone ?></a>
            </div>
        <?php } ?>
        <?php if ($email) { ?>
            <div class="footer__text">
                <a class="link-text link-email" href="mailto:<?= $email ?>"><?= $email ?></a>
            </div>
        <?php } ?>
        <div class="footer__text">
            <a class="vk-link" href="https://vk.com/dom86" target="_blank">
                <!--                <img src="/images/vk_small.svg" alt="vk" class="vk-icon">-->
                <svg class="vk-icon" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#icon-vk"/>
                </svg>
            </a>
        </div>
    </div>
</footer>