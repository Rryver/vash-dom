<?php

namespace app\backend\models\settings;

use yii\base\Model;
use Yii;

class SettingsConfigurationForm extends Model implements SettingsFormInterface
{
    /**
     * @var string application name
     */
    public $appName;

    /**
     * @var string Email, на который будут отправляться уведомления о новых заявках
     */
    public $adminEmail;

    /**
     * @var string Ссылка на страницу политики конфиденциальности
     */
    public $privacyPolicyLink;

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['appName', 'adminEmail', 'privacyPolicyLink'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'appName' => 'Имя приложения',
            'adminEmail' => 'Email администратора',
            'privacyPolicyLink' => 'Ссылка на страницу политики конфиденциальности',
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getActionName(): string
    {
        return "settings-configurations";
    }

    /**
     * @inheritDoc
     */
    public static function getSection(): string
    {
        return "SettingsConfigurationForm";
    }
}