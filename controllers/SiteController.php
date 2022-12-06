<?php

namespace app\controllers;

use app\models\MainSlide;
use app\models\Message;
use app\models\MessagePromo;
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

    public function actionTestMail()
    {
        $message = new MessagePromo();

        $message->name = 'test name';
        $message->phone = '+79211233322';
        $message->message = "У Вас есть возможность обставить свое жилье так, как этого хотите Вы. Окружить себя теми предметами, которые будут полезны и удобны. Найти то, что будет поднимать настроение и задавать ритм Вашей жизни. Сделайте это без лишних потерь – финансовых и временных.
- 3 выставочных зала;
- У нас большой опыт работы, знания и профессиональный коллектив;
- У нас покупатель подбирает именно такой материал, который бы идеально подходил под интерьер и стиль;
- Мебель можно заказать любой конструкции, как по собственному проекту, так и по предложениям нашего дизайнера;
- Для каждого клиента – у нас индивидуальный подход, учитывая все его пожелания, потребности и требования.";

        $message->promo_name_when_created_at = "<span class=\"text-color-red\">Вытяжка</span> в подарок!";

        $message->sendMailToAdmin();
    }
}
