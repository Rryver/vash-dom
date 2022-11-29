<?php


namespace app\controllers;


use app\models\Project;
use yii\web\Controller;

class ProjectsController extends Controller
{
    public $layout = 'secondary';

    public function actionWorks()
    {
        $projects = Project::find()->where(['visible' => Project::VISIBLE])->orderBy(['sort' => SORT_ASC])->limit(18)->all();
        return $this->render('works', ['projects' => $projects]);
    }
}