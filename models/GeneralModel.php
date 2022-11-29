<?php


namespace app\models;


use yii\db\ActiveRecord;

class GeneralModel extends ActiveRecord
{

    const VISIBLE = 1;
    const HIDDEN = 0;

    public static function getYesNoOptions()
    {
        return [1 => 'Да', 0 => 'Нет'];
    }

}