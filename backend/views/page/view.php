<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Project $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Страницы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'slug',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('/page/' . $model->slug, Url::to('/page/' . $model->slug));
                },
            ],
            [
                'attribute' => 'content',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::tag("div", $model->content, ['class' => 'container', 'style' => 'margin-left: 0; padding-left: 0']);
                },
            ],
            'visible:boolean',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
