<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * This is class model for table '{{%log}}'
 * @package app\models
 *
 * @property int $id
 * @property int $level
 * @property string $category
 * @property double $log_time
 * @property string $prefix
 * @property string $message
 */
class Log extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%log}}';
    }
}