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

                'blockAboutText',
            ], 'string', 'max' => 255],
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
}