<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'id',
            'title',
            'created_at',
            'updated_at',
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
