<?php


namespace app\models;


use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is class model for table '{{%promo}}'
 * @package app\models
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $visible
 * @property integer $show_in_slider
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 */
class Promo extends GeneralModel
{
    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%promo}}';
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            'sortable' => [
                'class' => \kotchuprik\sortable\behaviors\Sortable::class,
                'query' => self::find(),
                'orderAttribute' => 'sort',
            ],
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
            [['description'], 'string'],
            [['sort', 'visible', 'show_in_slider', 'created_at', 'updated_at'], 'integer'],
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
            'description' => Yii::t('app', 'Description'),
            'show_in_slider' => Yii::t('app', 'Show in slider'),
            'sort' => Yii::t('app', 'Sort'),
            'visible' => Yii::t('app', 'Visible'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

}