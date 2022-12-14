<?php

use app\backend\models\settings\SettingsContentForm;
use app\backend\models\settings\SettingsSeoForm;


/**
 * @var yii\web\View $this
 * @var \app\models\Promo[] $promos
 * @var \app\models\Project[] $projects
 * @var \app\models\MainSlide[] $mainSlides
 * @var \app\models\Step[] $steps
 */

$this->title = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'homePageTitle');
$keywords = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'homePageKeywords');
$description = Yii::$app->settings->get(SettingsSeoForm::getSection(), 'homePageDescription');
$blockAboutText = Yii::$app->settings->get(SettingsContentForm::getSection(), 'blockAboutText');

if ($keywords) {
    $this->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
}

if ($description) {
    $this->registerMetaTag(['name' => 'description', 'content' => $description]);
}

?>

<?= $this->render('partials/_slider-main', ['mainSlides' => $mainSlides]) ?>


<section class="about">
    <div class="container">
        <div class="about__wrapper">
            <img class="about__line line-top-left" src="/images/about_line_top-left.svg">
            <img class="about__line line-top-right" src="/images/about_line_top-right.svg">
            <!--                    <img class="about__line_top" src="images/about_top.svg">-->
            <div class="about__header">
                <h1 class="heading-36">САЛОН МЕБЕЛИ «<span class="text-color-red">ВАШ ДОМ</span>»</h1>
            </div>
            <?php if ($blockAboutText) { ?>
                <div class="about__content">
                    <?= $blockAboutText ?>
                </div>
            <?php } ?>
            <div class="about__footer">
                <h1 class="heading-36">ПРИЯТНО БЫТЬ <span class="text-color-red">ДОМА</span></h1>
            </div>
            <!--                    <img class="about__line_footer" src="images/about_footer.svg">-->
            <img class="about__line line-bottom-left" src="/images/about_line_bottom-left.svg">
            <img class="about__line line-bottom-right" src="/images/about_line_bottom-right.svg">
        </div>
    </div>
</section>

<?= $this->render('/templates/_block-promo', ['promos' => $promos]) ?>

<?= $this->render('/templates/_block-steps', ['steps' => $steps]) ?>

<?= $this->render('/templates/_block-our-works', ['projects' => $projects]) ?>