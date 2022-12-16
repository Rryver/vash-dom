<?php


namespace app\controllers;


use app\models\Page;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    public $layout = 'secondary';

    public function actionView($slug = null)
    {
        $page = Page::find()->where(['slug' => $slug])->andWhere(['visible' => Page::VISIBLE])->one();

        if (!$page) {
            throw new NotFoundHttpException("Страница не найдена", 404);
        }

        return $this->render('view', [
            'page' => $page
        ]);
    }
}