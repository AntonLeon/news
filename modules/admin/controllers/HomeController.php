<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\Post;
use app\modules\admin\models\Author;
use app\modules\admin\models\Logo;
use app\modules\admin\models\Category;


class HomeController extends Controller
{
    public function actionIndex()
    {
        $logo = Logo::find()->count();
        $posts = Post::find()->count();
        $authors = Author::find()->count();
        $categories = Category::find()->count();

        return $this->render('index', compact('posts', 'authors', 'categories', 'logo'));
    }
}
