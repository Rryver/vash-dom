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
        'renderInnerContainer' => true,
    ]);

    echo Nav::widget([
        'options' => [
            'class' => 'navbar-nav',
        ],
        'items' => require(__DIR__ . '/' . '_menuArray.php'),
    ]);

//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav'],
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest ? (
//            ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
//        ],
//    ]);
    NavBar::end();
    ?>
</header>

