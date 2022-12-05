<?php

namespace app\backend\models\settings;

use yii\base\Model;
use Yii;

class SettingsContentForm extends Model implements SettingsFormInterface
{
    public $phone;
    public $email;
    public $address;
    public $workTime;
    public $contactText;

    public $blockAboutText;


    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [[
                'phone',
                'email',
                'address',
                'workTime',
            ], 'string', 'max' => 255],

            [['blockAboutText', 'contactText'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'phone' => 'Телефон',
            'email' => 'Email',
            'address' => 'Адресс',
            'workTime' => 'Время работы',
            'contactText' => 'Контакты - Текст',

            'blockAboutText' => 'О нас - Текст',
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getActionName(): string
    {
        return "settings-content";
    }

    /**
     * @inheritDoc
     */
    public static function getSection(): string
    {
        return "SettingsContentForm";
    }
}