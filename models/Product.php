<?php


namespace app\models;


use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is class model for table '{{%product}}'
 * @package app\models
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 */
class Product extends GeneralModel
{
    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['sort', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'image' => Yii::t('app', 'Image'),
            'sort' => Yii::t('app', 'Sort'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

}