<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Message $model
 */

$this->title = 'Заявка на акцию';
$this->params['breadcrumbs'][] = ['label' => 'Заявки на акции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
            'visible:boolean',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
