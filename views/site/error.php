<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

$this->title = $name;

?>

<div class="container m-t-40">
    <div class="site-error text-center">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="m-t-20 m-b-50">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <div>
            <a class="btn btn-call" href="<?= Url::to('/') ?>">Вернуться на главную</a>
        </div>
    </div>
</div>
