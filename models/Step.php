<?php


namespace app\models;


use app\backend\components\ImageFileHelper;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is class model for table '{{%step}}'
 * @package app\models
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property integer $sort
 * @property integer $visible
 * @property integer $created_at
 * @property integer $updated_at
 */
class Step extends GeneralModel
{
    public $imageFile;

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%step}}';
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
            [['description', 'image'], 'string'],
            [['sort', 'visible', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'image' => 'Изображение',
            'sort' => 'Позиция',
            'visible' => 'Видимость',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    public function beforeSave($insert)
    {
        ImageFileHelper::saveImage($this);

        return parent::beforeSave($insert);
    }

    public function deleteImage()
    {
        unlink(Yii::getAlias('@webroot') . $this->image);

        $this->image = null;
        $this->save();
    }

}