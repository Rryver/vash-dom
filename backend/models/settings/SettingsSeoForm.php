<?php

namespace app\backend\models\settings;

use yii\base\Model;
use Yii;

class SettingsSeoForm extends Model implements SettingsFormInterface
{
    public $homePageTitle;
    public $homePageKeywords;
    public $homePageDescription;

    public $promoPageTitle;
    public $promoPageKeywords;
    public $promoPageDescription;

    public $projectsPageTitle;
    public $projectsPageKeywords;
    public $projectsPageDescription;

    public $contactsPageTitle;
    public $contactsPageKeywords;
    public $contactsPageDescription;

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [[
                'homePageTitle',
                'homePageKeywords',
                'homePageDescription',

                'promoPageTitle',
                'promoPageKeywords',
                'promoPageDescription',

                'projectsPageTitle',
                'projectsPageKeywords',
                'projectsPageDescription',

                'contactsPageTitle',
                'contactsPageKeywords',
                'contactsPageDescription',
            ], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'homePageTitle' => 'Главная - Title',
            'homePageKeywords' => 'Главная - Keywords',
            'homePageDescription' => 'Главная - Description',
            'promoPageTitle' => 'Акции - Title',
            'promoPageKeywords' => 'Акции - Keywords',
            'promoPageDescription' => 'Акции - Description',
            'projectsPageTitle' => 'Наши работы - Title',
            'projectsPageKeywords' => 'Наши работы - Keywords',
            'projectsPageDescription' => 'Наши работы - Description',
            'contactsPageTitle' => 'Контакты - Title',
            'contactsPageKeywords' => 'Контакты - Keywords',
            'contactsPageDescription' => 'Контакты - Description',
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getActionName(): string
    {
        return "settings-seo";
    }

    /**
     * @inheritDoc
     */
    public static function getSection(): string
    {
        return "SettingsSeoForm";
    }
}