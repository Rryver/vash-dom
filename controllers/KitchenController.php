<?php


namespace app\controllers;


use yii\web\Controller;

class KitchenController extends Controller
{
    public $layout = 'secondary';

    public function actionWorks()
    {
        return $this->render('works');
    }
}