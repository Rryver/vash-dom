<?php

use yii\helpers\Html;

/**
 * @var \app\models\MessagePromo $model
 */

?>

<table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
    <tbody>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; max-width: 150px; width: 150px">Имя</td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= $model->name ?></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; max-width: 150px; width: 150px">Телефон</td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= $model->phone ?></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; max-width: 150px; width: 150px">Акция</td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= $model->promo_name_when_created_at ?></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; max-width: 150px; width: 150px">Сообщение</td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= Html::encode($model->message) ?></td>
        </tr>
    </tbody>
</table>
