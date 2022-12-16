<?php


namespace app\models;


use Yii;
use yii\base\Model;

class MenuItem extends Model
{
    public $label;
    public $url;

    public $controllerId;
    public $actionId;

    /**
     * @var array
     */
    private $rewriteRules = [];

    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    /**
     * Задает в переменную текущие настройки редиректов из файла config/rewrite.php в виде массива
     */
    public function setRewriteRules()
    {
        $sep = DIRECTORY_SEPARATOR;
        $this->rewriteRules = require(Yii::getAlias('@app') . $sep . 'config' . $sep . 'rules.php');
    }

    /**
     * Проверяет, является ли текущий элемент меню активным
     *
     * @return bool
     */
    public function isItemActive()
    {
        if ($this->url === null) {
            return false;
        }

        $url = ltrim($this->url, '/');

        try {
            return $url == Yii::$app->request->getPathInfo();
        } catch(\Exception $e) {
            Yii::error("Ошибка при проверке активного элемента меню" . PHP_EOL .
                "Ошибка: " . json_encode($e->getMessage(), JSON_UNESCAPED_UNICODE)
            );
        }

        return false;
    }
}