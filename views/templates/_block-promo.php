<?php

/**
 * @var \yii\web\View $this
 * @var \app\models\Promo[] $promos
 */

use yii\helpers\Url;

?>

<?php if ($promos) {?>
<section class="promo">
    <div class="container">
        <div class="promo__header section-header">
            <h2 class="heading-36">Акции</h2>
            <a class="link-underline" href="<?= Url::to('/promo') ?>">Все акции</a>
        </div>
        <div class="promo__content">
            <div class="promo__slider promo-slider">
                <div class="promo-slider__slides">

                    <?php foreach ($promos as $promo) { ?>
                        <div class="promo-slider__slide promo-slide">
                            <div class="promo-slide__picture">
                                <img class="promo-slide__image" src="<?= $promo->image ?>" alt="promo">
                                <span class="promo-slide__tag">Подарок</span>
                            </div>
                            <div class="promo-slide__info">
                                <h3 class="promo-slide__title"><?= $promo->title ?></h3>
                                <div class="promo-slide__text"><?= $promo->description ?></div>
                            </div>
                            <button class="promo-slide__link btn-call btn-modal-promo-request" data-bs-toggle="modal" data-bs-target="#modalPromo" data-promo-id="<?= $promo->id ?>">Участвовать в акции</button>
                        </div>
                    <?php } ?>
                </div>
                <div class="promo-slider__controls slider-controls">
                    <div class="slider-controls__btns-switch btn-switch prev">
                        <button class="slider-controls__btn-left">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="25" cy="25" r="24.5" transform="rotate(-180 25 25)" fill="#F7F7F7" stroke="#FF1B00"/>
                                <path d="M29.0322 37.0967L18.449 26.5135C18.0585 26.1229 18.0585 25.4898 18.449 25.0993L29.0322 14.516"
                                      stroke="#FF1B00" stroke-width="3" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <button class="slider-controls__btn-right btn-switch next">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="25" cy="25" r="24.5" fill="#F7F7F7" stroke="#FF1B00"/>
                                <path d="M20.9678 12.9033L31.551 23.4865C31.9415 23.8771 31.9415 24.5102 31.551 24.9007L20.9678 35.484"
                                      stroke="#FF1B00" stroke-width="3" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>