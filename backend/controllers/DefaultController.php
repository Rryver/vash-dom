<?php

namespace app\backend\controllers;


use app\backend\components\AdminController;
use yii\web\Controller;

/**
 * Default controller for the `backend` module
 */
class DefaultController extends AdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
