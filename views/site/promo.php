<?php

use app\backend\models\settings\SettingsSeoForm;
use yii\helpers\Url;

/**
 * @var \yii\web\View $this
 * @var \app\models\Promo[] $promos
 */

$this->title = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'promoPageTitle');
$keywords = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'promoPageKeywords');
$description = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'promoPageDescription');

if ($keywords) {
    $this->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
}

if ($description) {
    $this->registerMetaTag(['name' => 'description', 'content' => $description]);
}

?>

<section class="promo-all m-t-40">
    <div class="container">
        <div class="our-works__header section-header">
            <h2 class="heading-36">Акции</h2>
        </div>
        <div class="promo__content">
            <?php if ($promos) { ?>
                <div class="promo-all__list promo-list">

                    <?php foreach ($promos as $promo) { ?>
                        <div class="promo-list__card promo-card col-lg-4 col-md-6 col-sm-12 col-12" style="background-image: url('<?= $promo->image ?>')">
                            <div class="promo-card__content promo-card__preview">
                                <div class="promo-card__title"><?= $promo->title ?></div>
                                <button class="promo-card__btn btn btn-text">Подробнее</button>
                            </div>
                            <div class="promo-card__content promo-card__info promo-info promo-card__hidden">
                                <div class="flex__helper">
                                    <div class="promo-card__title"><?= $promo->title ?></div>
                                    <div class="promo-card__text"><?= $promo->description ?></div>
                                </div>
                                <button class="promo-card__btn btn btn-text btn-modal-promo-request" data-bs-toggle="modal" data-bs-target="#modalPromo" data-promo-id="<?= $promo->id ?>">Участвовать в акции</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>

<!--                <div class="promo-all__btn-wrap m-t-20">-->
<!--                    <a class="btn btn-call" href="--><?//= Url::to("/works") ?><!--">Показать еще</a>-->
<!--                </div>-->
            <?php } ?>
        </div>
    </div>
</section>
