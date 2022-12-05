<?php

use app\models\Page;

/**
 * @var \yii\web\View $this
 * @var Page $page
 */

$this->title = $page->title;

if ($page->seo_keywords) {
    $this->registerMetaTag(['name' => 'keywords', 'content' => $page->seo_keywords]);
}

if ($page->seo_description) {
    $this->registerMetaTag(['name' => 'description', 'content' => $page->seo_description]);
}

?>

<section class="about-page m-t-40">
    <div class="container">
        <div class="about-page__header section-header">
            <h1 class=""><?= $page->title ?></h1>
        </div>
        <div class="about-page__content m-t-30">
            <?= $page->content ?>
        </div>
    </div>
</section>