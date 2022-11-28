<?php


namespace app\controllers;


use yii\web\Controller;

class ProjectsController extends Controller
{
    public $layout = 'secondary';

    public function actionWorks()
    {
        return $this->render('works');
    }
}