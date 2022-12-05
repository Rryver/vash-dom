<?php

namespace app\controllers;

use app\models\MainSlide;
use app\models\Project;
use app\models\Promo;
use app\models\Step;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    public $layout = 'secondary';

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'main';

        $promos = Promo::findAll(['visible' => Promo::VISIBLE, 'show_in_slider' => Promo::VISIBLE]);
        $projects = Project::find()->where(['visible' => Project::VISIBLE])->orderBy(['sort' => SORT_ASC])->limit(6)->all();
        $mainSlides = MainSlide::find()->where(['visible' => MainSlide::VISIBLE])->orderBy(['sort' => SORT_ASC])->all();
        $steps = Step::find()->where(['visible' => Step::VISIBLE])->orderBy(['sort' => SORT_ASC])->all();
        return $this->render('index', [
            'promos' => $promos,
            'projects' => $projects,
            'mainSlides' => $mainSlides,
            'steps' => $steps
        ]);
    }

    /**
     * Displays contacts page.
     *
     * @return Response|string
     */
    public function actionContacts()
    {
        return $this->render('contacts');
    }

    /**
     * Displays promo page.
     *
     * @return string
     */
    public function actionPromo()
    {
        $promos = Promo::findAll(['visible' => Promo::VISIBLE]);
        return $this->render('promo', ['promos' => $promos]);
    }

}
