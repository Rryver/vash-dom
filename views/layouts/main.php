<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use app\widgets\breadcrumbsCustom\BreadcrumbsCustom;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- Favicon -->
    <link rel="icon" type="image/ico" href="/images/favicon.ico">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <?= $this->render('/templates/_header') ?>

    <main class="content">


        <?= Alert::widget() ?>

        <?= $content ?>

        <?= $this->render('/templates/_block-request') ?>
    </main>
</div>

<?= $this->render('/templates/_footer') ?>

<?= $this->render('/templates/_svg') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
