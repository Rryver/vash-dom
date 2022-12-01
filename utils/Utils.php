<?php


namespace app\utils;


use yii\helpers\Url;

class Utils
{
    public static function getClearedHostUrl()
    {
        return substr(Url::base(''), '2');
    }

    /**
     * Удаление из номера телефона лишних символов: +, (, ), -, и других.
     *
     * @param $phone
     * @return string|string[]|null
     */
    public static function clearPhone($phone)
    {
        return preg_replace('/[^0-9]/', '', $phone);
    }

    public static function preparePhoneToForm($phone)
    {
        $phone = static::clearPhone($phone);

        return substr($phone, '1');
    }

    public static function phoneToPrettyPrint($phone)
    {
        $phone = static::clearPhone($phone);
        if (strlen($phone) == 11) {
            $prettyPhone = '';
            $prettyPhone .= '+7';
            $prettyPhone .= ' (' . substr($phone, '1', 3) . ') ' . substr($phone, 4, 3);
            $prettyPhone .= '-' . substr($phone, 7, 2);
            $prettyPhone .= '-' . substr($phone, 9, 2);

            return $prettyPhone;
        }

        return $phone;
    }

    /**
     * @param $bytes
     * @return string
     */
    public static function bytesToString($bytes)
    {
        $kilobytes = round($bytes / 1024, '1');
        if ($kilobytes > 1024) {
            return $kilobytes / 1024 . " Mb";
        }

        return $kilobytes . " Kb";
    }

    public static function getClassEndname($classname) {
        $tmp = explode('\\', $classname);
        return end($tmp);
    }

    /**
     * Преобразует rules ошибки в строку для вывода на фронте
     * @param $errors
     * @return string
     */
    public static function errorsToStr($errors)
    {
        $errorMessage = '';

        foreach ($errors as $error) {
            $errorMessage .= $error[0] . '<br>';
        }

        return $errorMessage;
    }
}