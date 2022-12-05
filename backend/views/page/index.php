<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\models\search\ProjectsSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Страницы');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'columns' => [
            [
                'attribute' => 'id',
                'filter' => false,
            ],
            'title',
            [
                'attribute' => 'slug',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('/page/' . $model->slug, Url::to('/page/' . $model->slug));
                },
            ],
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
    ]); ?>

    <?php Pjax::end(); ?>

</div>
