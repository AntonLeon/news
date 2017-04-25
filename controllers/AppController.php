<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.03.2017
 * Time: 18:09
 */

namespace app\controllers;

use yii\web\Controller;
use yii\behaviors\SluggableBehavior;

class AppController extends Controller
{
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
}