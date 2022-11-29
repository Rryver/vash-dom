<?php


namespace app\backend\controllers;


use app\backend\components\AdminController;
use app\models\search\MessagePromoSearch;

class MessagePromoController extends AdminController
{
    /**
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessagePromoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}