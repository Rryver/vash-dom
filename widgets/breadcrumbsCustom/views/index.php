<?php

use yii\bootstrap5\Breadcrumbs;

/* @var $links array */

?>

<div class="breadcrumbs-block m-t-20 m-b-20">
    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => 'Главная',
                'url' => '/',
            ],
            'links' => $links
        ]); ?>
    </div>
</div>