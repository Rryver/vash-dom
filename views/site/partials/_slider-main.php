<?php

/**
 * @var \yii\web\View $this
 * @var \app\models\MainSlide[] $mainSlides
 */

?>

<?php if ($mainSlides) { ?>
<section class="banner">
    <div class="container-wide">
        <div class="main-slider">
            <?php foreach ($mainSlides as $mainSlide) { ?>
                <div class="main-slide" style="background-image: url('<?= $mainSlide->image ?>')">
                    <div class="container">
                        <div class="main-slide__wrapper">
                            <div class="main-slide__title-wrap">
                                <h2 class="main-slide__title"><?= $mainSlide->title ?></h2>
                            </div>
                            <button class="main-slide__btn btn btn-call" data-bs-toggle="modal" data-bs-target="#modalTest">Оставить заявку</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } else { ?>
<section style="height: 100px">
</section>
<?php } ?>
