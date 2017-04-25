<?php

namespace app\controllers;

use app\modules\admin\models\Logo;
use Yii;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Post;
use app\models\Slider;
use app\models\Banner;
use yii\helpers\Url;


class SiteController extends AppController
{
        /**
     * @inheritdoc
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
        $featuredNews = Post::whereOrderLimitPost(['actives' => 1, 'post_featured' => 1], 'post_id DESC', 2);
        $sliders = Slider::whereSlider(['slider_active' => 1]);
        $banners = Banner::orderLimitBanner('id DESC', 2);
        $featuredNewsCount = Post::arrayWhereOrderCountPost(['actives' => 1], 'date DESC');
        $latestPosts = Post::whereOrderLimitOffsetPost(['actives' => 1], 'post_id DESC', 3, 1);
        $latestPost = Post::whereOrderLimitPost(['actives' => 1], 'post_id DESC', 1);


        return $this->render('index', compact('latestPost', 'latestPosts', 'featuredNews', 'sliders', 'banners', 'featuredNewsCount'));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(Url::to(['admin/']));
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
