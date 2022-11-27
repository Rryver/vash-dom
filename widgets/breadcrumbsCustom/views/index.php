<?php

use yii\widgets\Breadcrumbs ;

/* @var $links array */

?>

<div class="breadcrumbs-block m-t-10 m-b-10">
    <div class="container">
        <?= Breadcrumbs::widget(['links' => $links]); ?>
    </div>
</div>