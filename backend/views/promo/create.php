<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Promo $model
 */

$this->title = Yii::t('app', 'Create Promo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Акции'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
