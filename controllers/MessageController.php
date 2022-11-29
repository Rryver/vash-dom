<?php

namespace app\controllers;

use app\models\Message;
use app\models\MessagePromo;
use app\models\Promo;
use Yii;
use yii\web\Controller;

class MessageController extends Controller
{
    public $layout = 'secondary';

    public function actionMessage()
    {
        $message = new Message();
        if ($message->load(Yii::$app->request->post()) && $message->validate()) {
            if ($message->save()) {
                return $this->redirect("/messageSuccess");
            }
        }
        return $this->redirect("/messageError");
    }

    public function actionPromo()
    {
        $messagePromo = new MessagePromo();
        if ($messagePromo->load(Yii::$app->request->post()) && $messagePromo->validate()) {
            $promo = Promo::findOne(['id' => $messagePromo->promo_id, 'visible' => Promo::VISIBLE]);
            if ($promo) {
                $messagePromo->promo_name_when_created_at = $promo->title;
                if ($messagePromo->save()) {
                    return $this->redirect("/messageSuccess");
                }
            }
        }
        return $this->redirect("/messageError");
    }

    /**
     * Displays success page.
     *
     * @return string
     */
    public function actionSuccess()
    {
        return $this->render('success');
    }

    /**
     * Displays error page.
     *
     * @return string
     */
    public function actionError()
    {
        return $this->render('error');
    }

}
