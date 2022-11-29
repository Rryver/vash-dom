<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use app\widgets\breadcrumbsCustom\BreadcrumbsCustom;
use yii\bootstrap5\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, user-scalable=no']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <!-- Favicon -->
    <link rel="icon" type="image/ico" href="/images/favicon.ico">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="">
<?php $this->beginBody() ?>

<div class="wrapper">
    <?= $this->render('/templates/_header', ['isSecondaryHeader' => true]) ?>

    <main class="content">
        <?= BreadcrumbsCustom::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>

        <?= Alert::widget() ?>

        <?= $content ?>

        <?= $this->render('/templates/_block-request') ?>
    </main>
</div>

<?= $this->render('/templates/_footer') ?>

<?= $this->render('/templates/modals/_modal-message-form') ?>
<?= $this->render('/templates/modals/_modal-message-promo-form') ?>

<?= $this->render('/templates/_svg') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
