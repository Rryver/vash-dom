<?php


namespace app\models;


use app\backend\components\ImageFileHelper;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is class model for table '{{%promo}}'
 * @package app\models
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $tag
 * @property integer $visible
 * @property integer $show_in_slider
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 */
class Promo extends GeneralModel
{
    public $imageFile;

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
            [['title', 'tag'], 'string', 'max' => 255],
            [['description', 'image'], 'string'],
            [['sort', 'visible', 'show_in_slider', 'created_at', 'updated_at'], 'integer'],
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
            'tag' => 'Тэг',
            'sort' => 'Позиция',
            'visible' => 'Видимость',
            'show_in_slider' => 'Показывать в слайдере',
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