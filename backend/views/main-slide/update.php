<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Project $model
 */

$this->title = Yii::t('app', 'Обновить: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Главный слайдер'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title ? : "Заголовок не задан", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="order-update">
    <div class="panel panel-default">

        <div class="panel-heading">
            <h1 class="panel-title font-weight-bold"><?= Html::encode($this->title) ?></h1>
        </div>

        <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

        </div>
    </div>
</div>
