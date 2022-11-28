<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = "Успех";

?>

<div class="container m-t-40">
    <div class="site-success text-center">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="m-t-20 m-b-50">
            Ваша заявка успешно отправлена. Мы свяжемся с вами в ближайшее время.
        </div>

        <div>
            <a class="btn btn-call" href="<?= Url::to('/') ?>">Вернуться на главную</a>
        </div>
    </div>
</div>
