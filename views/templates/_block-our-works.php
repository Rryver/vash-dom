<?php

use yii\helpers\Url;

/**
 * @var \yii\web\View $this
 * @var \app\models\Project[] $projects
 */

?>

<?php if ($projects) { ?>
<section class="our-works">
    <div class="container">
        <div class="our-works__header section-header">
            <h2 class="heading-36">Наши работы</h2>
            <a class="link-underline" href="<?= Url::to('/works') ?>">Все работы</a>
        </div>
        <div class="our-works__content">
            <div class="our-works__list works-list">
                <?php foreach ($projects as $project) { ?>
                    <a class="works-list__card works-card col-lg-4 col-sm-6 col-12" href="/images/our-works/our-works_1.jpg" data-fancybox="our-works">
                        <img class="works-card__img" src="/images/our-works/our-works_1.jpg">
                        <div class="works-card__title"><?= $project->title ?></div>
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="our-works__btn-wrap">
            <a class="btn btn-call" href="<?= Url::to('/works') ?>">Смотреть все наши работы</a>
        </div>
    </div>
</section>
<?php } ?>
