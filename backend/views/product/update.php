<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = Yii::t('app', 'Update Product: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Procuts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
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
