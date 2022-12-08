<?php

use yii\helpers\Url;

/**
 * @var \yii\web\View $this
 * @var string $isSecondaryHeader Вариант отображения хедера
 */

if (!isset($isSecondaryHeader)) {
    $isSecondaryHeader = false;
}

?>

<header class="header <?= $isSecondaryHeader ? "header-secondary" : "" ?>">
    <div class="container-wide">
        <div class="header__background-blur">
            <div class="container h-100">
                <div class="header-wrapper">
                    <div class="header__left">
                        <a class="header__logo" href="<?= \yii\helpers\Url::to('/') ?>">
                            <img class="logo" src="/images/logo.svg" alt="logo">
                        </a>
                    </div>
                    <div class="header__menu main-menu">
                        <ul class="main-menu__list">
                            <li class="main-menu__item">
                                <a href="<?= Url::to('/works') ?>" class="main-menu__link">Галерея</a>
                            </li>
                            <li class="main-menu__item">
                                <a href="<?= Url::to('/page/o-nas') ?>" class="main-menu__link">О нас</a>
                            </li>
                            <li class="main-menu__item">
                                <a href="<?= Url::to('/promo') ?>" class="main-menu__link">Акции</a>
                            </li>
                            <li class="main-menu__item">
                                <a href="<?= Url::to('/contacts') ?>" class="main-menu__link">Контакты</a>
                            </li>
                        </ul>
                        <div class="header__btns header__btns_mobile">
                            <span class="header__city"><img class="map-icon" src="/images/icons/map-marker-svgrepo-com.svg" alt="">Череповец</span>
                            <a class="vk-link" href="https://vk.com/dom86" target="_blank">
                                <svg class="vk-icon" xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="#icon-vk"/>
                                </svg>
                            </a>
                            <button class="header__btn-call btn btn-call" data-bs-toggle="modal" data-bs-target="#modalTest">Оставить заявку</button>
                        </div>
                    </div>
                    <div class="header__btns header__btns_pc">
                        <span class="header__city"><img class="map-icon" src="/images/icons/map-marker-svgrepo-com.svg" alt="">Череповец</span>
                        <a class="vk-link" href="https://vk.com/dom86" target="_blank">
                            <svg class="vk-icon" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#icon-vk"/>
                            </svg>
                        </a>
                        <button class="header__btn-call btn btn-call" data-bs-toggle="modal" data-bs-target="#modalTest">Оставить заявку</button>

                        <button class="header__menu-button button-hamburger">
                            <div class="button-hamburger__line"></div>
                            <div class="button-hamburger__line"></div>
                            <div class="button-hamburger__line"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header__menu main-menu_mobile">
        <div class="main-menu_mobile__btn-close-helper text-align-left">
            <button class="main-menu_mobile__button-close btn-close" id="btn-close-menu"></button>
        </div>
        <ul class="main-menu_mobile__list">
            <li class="main-menu_mobile__item">
                <a href="<?= Url::to('/works') ?>" class="main-menu__link">Галерея</a>
            </li>
            <li class="main-menu_mobile__item">
                <a href="<?= Url::to('/page/o-nas') ?>" class="main-menu__link">О нас</a>
            </li>
            <li class="main-menu_mobile__item">
                <a href="<?= Url::to('/promo') ?>" class="main-menu__link">Акции</a>
            </li>
            <li class="main-menu_mobile__item">
                <a href="<?= Url::to('/contacts') ?>" class="main-menu__link">Контакты</a>
            </li>
        </ul>
        <div class="header__btns header__btns_mobile">
            <span class="header__city"><img class="map-icon" src="/images/icons/map-marker-svgrepo-com.svg" alt="">Череповец</span>
            <a class="vk-link" href="https://vk.com/dom86" target="_blank">
                <svg class="vk-icon" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#icon-vk"/>
                </svg>
            </a>
            <button class="header__btn-call btn btn-call" data-bs-toggle="modal" data-bs-target="#modalTest">Оставить заявку</button>
        </div>
    </div>
</header>
