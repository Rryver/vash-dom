<?php


namespace app\backend\models\settings;


interface SettingsFormInterface
{
    /**
     * Возвращает строку с названием экшена
     * @return string
     */
    public static function getActionName() : string;

    /**
     * Возвращает строку с секцией
     * @return string
     */
    public static function getSection() : string;
}