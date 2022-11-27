<?php

namespace app\backend\components;

use yii\filters\VerbFilter;

class AdminController extends \yii\web\Controller
{
    public $layout = 'main';

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
}