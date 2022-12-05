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
     * @var string admin email
     */
    public $adminEmail;

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['appName', 'adminEmail'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'appName' => Yii::t('app', 'Application Name'),
            'adminEmail' => Yii::t('app', 'Admin Email'),
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