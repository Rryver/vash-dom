<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\models\search\MessagePromoSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Заявки на акции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <div class="glyphicong gly">qwe</div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'pager' => [
            'class' => 'yii\bootstrap5\LinkPager',
        ],
        'rowOptions' => function($model) {
            return [
                'class' => $model->isNew ? "new-record" : "",
            ];
        },
        'columns' => [
            [
                'label' => 'Новая?',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::button($model->isNew ? "Новое" : "Просм.", [
                        'class' => 'btn-record-is-new btn btn-sm' . ($model->isNew ? " btn-warning" : ""),
                        'data-record-id' => $model->id,
                    ]);
                }
            ],
            [
                'attribute' => 'id',
                'filter' => false,
            ],
            'name',
            'phone',
            'message:ntext',
            [
                'attribute' => 'promo_id',
                'format' => 'raw',
                'value' => function($model) {
                    if (!\app\models\Promo::find()->where(['id' => $model->promo_id])->exists()) {
                        return $model->promo_name_when_created_at;
                    }
                    return Html::a($model->promo_name_when_created_at, \yii\helpers\Url::to("/admin/promo/view/" . $model->promo_id));
                }
            ],
            'created_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Просм.',
                'headerOptions' => ['width' => '50'],
                'template' => '{view}',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Уд.',
                'headerOptions' => ['width' => '50'],
                'template' => '{delete}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<?php
$script = <<< JS
$(".btn-record-is-new").on("click", function(e) {
  e.preventDefault();
  
  let btn = $(this);

  $.ajax({
    url: '/admin/message-promo/toggle-is-new',
    data: {
        id : btn.attr('data-record-id')        
    },
    success: function (data) {
        console.log(data);
        if (data === true) {
            btn.parent().parent().toggleClass('new-record');
            if (btn.hasClass('btn-warning')) {
                btn.text('Просм.');
            } else {
                btn.text('Новое');
            }
            btn.toggleClass("btn-warning");
        } else {
            alert('Произошла ошибка');
        }
    },
    fail: function (data) {
        alert('Произошла ошибка');
    },
  });
})
JS;
$this->registerJs($script, yii\web\View::POS_READY);