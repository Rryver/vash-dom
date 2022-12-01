<?php

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

?>

<header>
    <?php

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark',
        ],
        'innerContainerOptions' => [
            'class' => 'container-fluid',
        ],
        'collapseOptions' => [
            'class' => 'justify-content-between'
        ],
        'renderInnerContainer' => true,
    ]);

    echo Nav::widget([
        'options' => [
            'class' => 'navbar-nav',
        ],
        'items' => require(__DIR__ . '/' . '_menuArray.php'),
    ]);

    echo Nav::widget([
        'options' => [
            'class' => 'navbar-nav',
        ],
        'items' => require(__DIR__ . '/' . '_menuArray-right.php'),
    ]);

    NavBar::end();
    ?>
</header>

