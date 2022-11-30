<?php


namespace app\models;


use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is class model for table '{{%main_slide}}'
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
class MainSlide extends GeneralModel
{
    public $imageFile;

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%main_slide}}';
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
            [['image'], 'string'],
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

    public function beforeSave($insert)
    {
        $imageFile = UploadedFile::getInstance($this, 'imageFile');
        if (is_object($imageFile)) {
            $path = 'uploads/' . $imageFile->baseName . '.' . $imageFile->extension;
            if ($imageFile->saveAs($path)) {
                $this->image = "/" . $path;
            }
        } else if (!$imageFile) {
            unset($this->image);
            $this->image = null;
        }

        return parent::beforeSave($insert);
    }

}