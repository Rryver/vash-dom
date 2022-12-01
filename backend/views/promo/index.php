<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\models\search\PromoSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Акции');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Promo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'rowOptions' => function ($model, $key, $index, $grid) {
            return ['data-sortable-id' => $model->id];
        },
        'columns' => [
            [
                'class' => \kotchuprik\sortable\grid\Column::className(),
            ],
            [
                'attribute' => 'image',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:300px;'],
                'value' => function($model) {
                    return Html::img($model->image);
                }
            ],
            [
                'attribute' => 'id',
                'filter' => false,
            ],
            'title',
            'description',
            'show_in_slider:boolean',
            'visible:boolean',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Просм.',
                'headerOptions' => ['width' => '50'],
                'template' => '{view}',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Ред.',
                'headerOptions' => ['width' => '50'],
                'template' => '{update}',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Уд.',
                'headerOptions' => ['width' => '50'],
                'template' => '{delete}',
            ],
        ],
        'options' => [
            'data' => [
                'sortable-widget' => 1,
                'sortable-url' => \yii\helpers\Url::toRoute(['sorting']),
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
