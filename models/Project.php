<?php


namespace app\models;


use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is class model for table '{{%project}}'
 * @package app\models
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $sort
 * @property integer $visible
 * @property integer $created_at
 * @property integer $updated_at
 */
class Project extends GeneralModel
{
    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%project}}';
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
            [['sort', 'visible', 'created_at', 'updated_at'], 'integer'],
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
            'visible' => Yii::t('app', 'Visible'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

}