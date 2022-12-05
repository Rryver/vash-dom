<?php


namespace app\backend\controllers;


use app\backend\components\AdminController;
use app\backend\models\settings\SettingsConfigurationForm;
use app\backend\models\settings\SettingsContentForm;
use app\backend\models\settings\SettingsSeoForm;
use app\utils\Utils;
use Yii;
use yii2mod\settings\actions\SettingsAction;

class SettingsController extends AdminController
{
    const SUCCESS_MESSAGE = 'Настройки успешно обновлены';

    public function actions()
    {
        return [
            SettingsConfigurationForm::getActionName() => [
                'class' => SettingsAction::class,
                'successMessage' => self::SUCCESS_MESSAGE,
                'view' => 'configuration',
                'modelClass' => SettingsConfigurationForm::class,
                'saveSettings' => function($model) {
                    $this->saveSettings($model, SettingsConfigurationForm::getSection());
                }
            ],
            SettingsContentForm::getActionName() => [
                'class' => SettingsAction::class,
                'successMessage' => self::SUCCESS_MESSAGE,
                'view' => 'content',
                'modelClass' => SettingsContentForm::class,
                'saveSettings' => function($model) {
                    $this->saveSettings($model, SettingsContentForm::getSection());
                }
            ],
            SettingsSeoForm::getActionName() => [
                'class' => SettingsAction::class,
                'successMessage' => self::SUCCESS_MESSAGE,
                'view' => 'seo',
                'modelClass' => SettingsSeoForm::class,
                'saveSettings' => function($model) {
                    $this->saveSettings($model, SettingsSeoForm::getSection());
                }
            ],
        ];
    }

    private function saveSettings($model, $section)
    {
        //$model->saveFile();
        foreach ($model->toArray() as $key => $value) {
            if ($value === '') {
                Yii::$app->settings->remove($section, $key);
            } else {
                Yii::$app->settings->set($section, $key, $value);
            }
        }
    }

    /**
     * Добавление / обновление настройки
     *
     * @param $section
     * @param $key
     * @param $value
     * @param null $type
     * @return bool
     */
    public function actionSet($section, $key, $value, $type = null)
    {
        if (Yii::$app->settings->set($section, $key, $value, $type)) {
            return true;
        }

        return false;
    }

    /**
     * Удаление настройки
     *
     * @param $section
     * @param $key
     * @return bool
     */
    public function actionRemove($section, $key)
    {
        if (Yii::$app->settings->remove($section, $key)) {
            return true;
        }

        return false;
    }
}