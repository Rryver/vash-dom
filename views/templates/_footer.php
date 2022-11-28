<?php

?>

<?php
//TODO Изменить height:unset в .less файле. Сейчас измеено руками в main.css
//TODO Настроить gulp
?>
<footer class="footer">
    <div class="footer__content">
        <a class="footer__logo" href="#">
            <img class="logo" src="images/logo.svg" alt="logo">
        </a>

        <div class="footer__text">Консультации по телефону: с 9:00 до 21:00</div>
        <div class="footer__text">
            <a class="link-text link-phone" href="tel:+7 (921) 123-45-67">+7 (921) 123-45-67</a>
        </div>
        <div class="footer__text">
            <a class="link-text link-email" href="mailto:example@emaple.ru">example@emaple.ru</a>
        </div>
        <div class="footer__text">
            <a class="vk-link" href="https://vk.com/dom86" target="_blank">
                <!--                <img src="images/vk_small.svg" alt="vk" class="vk-icon">-->
                <svg class="vk-icon" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#icon-vk"/>
                </svg>
            </a>
        </div>
    </div>
</footer>