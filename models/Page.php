<?php


namespace app\models;


use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is class model for table '{{%project}}'
 * @package app\models
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property integer $visible
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property integer $created_at
 * @property integer $updated_at
 */
class Page extends GeneralModel
{
    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            //TODO Не работает на проде. Если включен, ставит в поиск по страницам в адмнике -3
//            [
//                'class' => SluggableBehavior::class,
//                'attribute' => 'title',
//                'slugAttribute' => 'slug',
//                'ensureUnique' => true,
//            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['title', 'slug', 'seo_title', 'seo_keywords', 'seo_description'], 'string', 'max' => 255],
            [['content'], 'string'],
            [['visible', 'created_at', 'updated_at'], 'integer'],
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
            'slug' => 'Url',
            'content' => 'Контент',
            'visible' => 'Видимость',
            'seo_title' => 'SEO Title',
            'seo_keywords' => 'SEO Keywords',
            'seo_description' => 'SEO Description',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }
}