<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Category;
use Yii;
use yii\web\Controller;
use app\modules\admin\models\Post;
use app\modules\admin\models\Author;
use app\modules\admin\models\Logo;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $logo = Logo::find()->count();
        $posts = Post::find()->count();
        $authors = Author::find()->count();
        $categories = Category::find()->count();

        return $this->render('index', compact('posts', 'authors', 'categories', 'logo'));
    }
}
