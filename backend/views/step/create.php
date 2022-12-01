<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Step $model
 */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Как мы работаем'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>