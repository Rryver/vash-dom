<?php

use app\backend\models\settings\SettingsSeoForm;

/**
 * @var \yii\web\View $this
 * @var \app\models\Project[] $projects
 */

$this->title = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'projectsPageTitle');
$keywords = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'projectsPageKeywords');
$description = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'projectsPageDescription');

if ($keywords) {
    $this->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
}

if ($description) {
    $this->registerMetaTag(['name' => 'description', 'content' => $description]);
}
\yii\behaviors\SluggableBehavior::class
?>


<section class="works m-t-40">
    <div class="container">
        <div class="our-works__header section-header">
            <h2 class="heading-36">Наши работы</h2>
        </div>
        <div class="our-works__content">
            <?php if ($projects) {?>
                <div class="our-works__list works-list">
                    <?php foreach ($projects as $project) { ?>
                        <a class="works-list__card works-card col-lg-4 col-sm-6 col-12" href="<?= $project->image ?>" data-fancybox="works-gallery">
                            <img class="works-card__img" src="<?= $project->image ?>">
                            <div class="works-card__title"><?= $project->title ?></div>
                        </a>
                    <?php } ?>
                </div>

                <div class="our-works__btn-wrap">
                    <a class="btn btn-call" href="works.html">Показать еще</a>
                </div>

            <?php } ?>

        </div>

    </div>
</section>