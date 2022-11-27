<?php

namespace app\backend\components;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AdminController extends \yii\web\Controller
{
    public $layout = 'main';

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                        'denyCallback' => function ($rule, $action) {
                            return $this->redirect('/user/login-admin');
                        }
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
}