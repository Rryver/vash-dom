<?php


namespace app\controllers;


use app\models\Project;
use yii\data\Pagination;
use yii\web\Controller;

class ProjectsController extends Controller
{
    public $layout = 'secondary';

    public function actionWorks()
    {
        $projectsQuery = Project::find()->where(['visible' => Project::VISIBLE])->orderBy(['sort' => SORT_ASC]);
        $pages = new Pagination([
            'totalCount' => $projectsQuery->count(),
            'pageSize' => 3,
        ]);
        $projects = $projectsQuery
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('works', [
            'projects' => $projects,
            'pages' => $pages,
        ]);
    }
}