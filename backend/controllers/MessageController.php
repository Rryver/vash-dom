<?php


namespace app\backend\controllers;


use app\backend\components\AdminController;
use app\models\Message;
use app\models\search\MessageSearch;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class MessageController extends AdminController
{
    /**
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $model->isNew = 0;
        $model->check = 142;
        $model->save();

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionToggleIsNew($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = $this->findModel($id);

        $model->isNew = (int)!$model->isNew;
        $model->check = 142;

        if ($model->save()) {
            return true;
        }

        return false;
    }
}