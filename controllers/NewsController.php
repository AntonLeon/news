<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.03.2017
 * Time: 22:02
 */

namespace app\controllers;

use app\models\Tag;
use Yii;
use app\models\Post;
use app\models\Slider;
use app\models\Category;
use app\models\Author;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class NewsController extends AppController
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $authors = Author::find()
            ->asArray()
            ->all();

        $tags = Tag::find()
            ->asArray()
            ->all();

        if (!Yii::$app->request->post('author') && !Yii::$app->request->post('tag') && !Yii::$app->request->post('sort')) {
            $al = Post::whereOrderArrayPost(['actives' => 1], 'date DESC');
        } else {
            $author_id = Yii::$app->request->post('author');
            $tag = Yii::$app->request->post('tag');
            $sort = implode(Yii::$app->request->post('sort'));
            var_dump($author_id);
            var_dump($tag);
            var_dump($sort);

            $al = Post::find()
                ->andWhere(['actives' => 1])
                ->andFilterWhere(['author_id' => $author_id, 'tag_id' => $tag])
                ->orderBy($sort)
                ->asArray()
                ->all();

            ?>
            <div class="all-posts" id="ol" style="display: inline-block; height: auto; width: 1140px">
                <?php foreach ($al as $key => $post): ?>
                    <div class="all-posts-panel"
                         style="box-shadow: 0 0 10px; float: left;  background-color: white; margin-left: 37px;  margin-top: 10px; border-left: 1px solid lightgray; border-right: 1px solid lightgray; border-bottom: 2px solid lightgray; width: 45%; height: 200px;">
                        <div class="all-posts-panel-heading"
                             style="width: 400px; height: auto; padding: 5px;float: right; border-top: 2px solid lightgray; max-height: 200px">
                            <h4 class="all-posts-panel-title"><?= Html::a($post['title'], [\yii\helpers\Url::to(['news/view', 'id' => $post['post_id']])]) ?></h4>
                            <?= \yii\helpers\StringHelper::truncateWords($post['text'], 20, '...') ?>
                        </div>
                        <div class="all-posts-panel-text"></div>
                        <div class="all-posts-panel-img" style="padding-top: 20px; padding-left: 5px; float: left;">
                            <?php if (file_exists('../' . $post['thumbnail_img'])) {
                                echo Html::img('../' . $post['thumbnail_img'], ['height' => '90px', 'width' => '100px']);
                            } else {
                                echo Html::img('/web/uploads/images/default/noimage.png', ['height' => '90px', 'width' => '100px']);
                            } ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <?php

        }
        if (Yii::$app->request->isAjax) {
            $this->layout = false;
            return $this->renderContent(null);
        } else {
            return $this->render('index', compact(
                'authors',
                'tags',
                'al'
            ));
        }
    }

    public function actionCategory()
    {
        $id = (int)Yii::$app->request->get('id');

            // Выбираем 5 постов в которых actives = 1, featured = 1 и сортируем по убыванию
        $sliders = Post::whereOrderLimitPost(['actives' => 1, 'post_featured' => 1], 'date DESC', 5);
        $categories = Category::find()->all(); // Выбираем все категории
        $categories_all = Category::find()->all(); // Выбираем все категории

        // Выбираем все посты, где actives = 1, категория = $id и сортируем по убыванию
        $posts = Post::whereOrderPost(['actives' => '1', 'category_id' => $id], 'post_id DESC');

        if (empty($posts)) { // Если массив post пустой, тогда 404
            throw new NotFoundHttpException;
        } else {
            return $this->render('category', compact(
                'posts',
                'categories',
                'pages',
                'sliders',
                'categories_all'
            ));
        }
    }

    public function actionView()
    {
        $categories = Category::limitCategories(9); // Выбираем 9 категоррий
        $categories_all = Category::allCategoties(); // Выбираем все категории
        $sliders = Slider::whereSlider(['slider_active' => 1]); // Выбираем все из таблицы slider где active = 1
        $post = Post::findOne(['slug' => Yii::$app->request->get('post')]); // Находим пост по get запросу

        if (empty($post)) { // Если массив post пустой, тогда 404
            throw new NotFoundHttpException;
        } else {
            return $this->render('view', compact(
                'post',
                'sliders',
                'categories',
                'categories_all'
            ));
        }
    }

    public function actionAll()
    {
        $per_page = 10; // Количество постов на страницу
        $categories = Category::limitCategories(9); // Выбираем 9 категорий
        $categories_all = Category::allCategoties(); // Выбираем все категории
        $authors = Author::find()->asArray()->all();
        $tags = Tag::find()->asArray()->all();

        // Выбираем 5 постов в которых actives = 1, featured = 1 и сортируем по убыванию
        $sliders = Post::whereOrderLimitPost(['actives' => 1, 'post_featured' => 1], 'post_id DESC', 5);

        if (!Yii::$app->request->post('author') && !Yii::$app->request->post('tag') && !Yii::$app->request->post('sort')) {
            $post_count = Post::whereCountPosts(['actives' => '1']); // Количество постов где actives = 1
            $post_pages = ceil($post_count / $per_page); // Количество целых страниц
            $post_limit = $per_page * Yii::$app->request->get('page');
            $post_offset = $post_limit - $per_page;

            if (Yii::$app->request->get('page')) {
                $posts = Post::find()
                    ->where(['actives' => '1'])
                    ->orderBy('post_id DESC')
                    ->limit($per_page)
                    ->offset($post_offset)
                    ->all();
            }

        } else {
            $author_id = Yii::$app->request->post('author');
            $tag = Yii::$app->request->post('tag');
            $sort = implode(Yii::$app->request->post('sort'));
            var_dump($author_id);
            var_dump($tag);
            var_dump($sort);

            $post_count = Post::find()
                ->andWhere(['actives' => 1])
                ->andFilterWhere(['author_id' => $author_id, 'tag_id' => $tag])
                 ->count();// Количество постов где actives = 1

            $post_pages = ceil($post_count / $per_page); // Количество целых страниц
            $post_limit = $per_page * Yii::$app->request->get('page');
            $post_offset = $post_limit - $per_page;

                $posts = Post::find()
                    ->andWhere(['actives' => 1])
                    ->andFilterWhere(['author_id' => $author_id, 'tag_id' => $tag])
                    ->orderBy($sort)
                    ->limit($per_page)
                    ->offset($post_offset)
                    ->all();
                ?>

                <div class="all-posts" style="display: inline-block; height: auto; width: 1140px">
                    <?php foreach ($posts as $key => $post): ?>
                        <div class="all-posts-panel"
                             style="box-shadow: 0 0 10px; float: left;  background-color: white; margin-left: 37px;  margin-top: 10px; border-left: 1px solid lightgray; border-right: 1px solid lightgray; border-bottom: 2px solid lightgray; width: 45%; height: 200px;">
                            <div class="all-posts-panel-heading"
                                 style="width: 400px; height: auto; padding: 5px;float: right; border-top: 2px solid lightgray; max-height: 200px">
                                <h4 class="all-posts-panel-title"><?= Html::a($post->title, [Url::to(['news/view', 'post' => $post->slug])]) ?></h4>
                                <?= StringHelper::truncateWords($post->text, 15, '...') ?>
                            </div>
                            <div class="all-posts-panel-text"></div>
                            <div class="all-posts-panel-img" style="padding-top: 20px; padding-left: 5px; float: left;">
                                <?php if (file_exists('../' . $post->thumbnail_img)) {
                                    echo Html::img('../' . $post->thumbnail_img, ['height' => '90px', 'width' => '100px']);
                                } else {
                                    echo Html::img('/web/uploads/images/default/noimage.png', ['height' => '90px', 'width' => '100px']);
                                } ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                <div class="all-posts-panel-pag row">
                    <?php if ($post_pages > 1) : ?>
                        <?php if ($post_pages < 5): ?>

                            <?php if (Yii::$app->request->get('page') != 1): ?>
                                <div
                                    class="pag-btn"><?= Html::a('<', [Url::to(['news/all', 'page' => Yii::$app->request->get('page') - 1])]) ?></div>
                            <?php endif ?>

                            <?php for ($page = 1; $page <= $post_pages; $page++): ?>
                                <?php if (Yii::$app->request->get('page') == $page): ?>
                                    <div class="pag-btn" id="pag-btn-noneactive"><?= Html::a($page) ?></div>
                                <?php else: ?>
                                    <div
                                        class="pag-btn"><?= Html::a($page, [Url::to(['news/all', 'page' => $page])]) ?></div>
                                <?php endif ?>
                            <?php endfor ?>

                            <?php if (Yii::$app->request->get('page') != $post_pages): ?>
                                <div
                                    class="pag-btn"><?= Html::a('>', [Url::to(['news/all', 'page' => Yii::$app->request->get('page') + 1])]) ?></div>
                            <?php endif ?>

                        <?php else: ?>

                            <?php if (Yii::$app->request->get('page') != 1): ?>
                                <div class="pag-btn"><?= Html::a('<<', [Url::to(['news/all', 'page' => 1])]) ?></div>
                                <div
                                    class="pag-btn"><?= Html::a('<', [Url::to(['news/all', 'page' => Yii::$app->request->get('page') - 1])]) ?></div>
                            <?php endif ?>

                            <?php for ($page = Yii::$app->request->get('page'); $page <= 4 + Yii::$app->request->get('page'); $page++): ?>
                                <?php if ($page < $post_pages): ?>
                                    <?php if (Yii::$app->request->get('page') == $page): ?>
                                        <div class="pag-btn" id="pag-btn-noneactive"><?= Html::a($page) ?></div>
                                    <?php else: ?>
                                        <div
                                            class="pag-btn"><?= Html::a($page, [Url::to(['news/all', 'page' => $page])]) ?></div>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endfor ?>

                            <?php if (Yii::$app->request->get('page') < $post_pages): ?>
                                <div class="pag-btn"><b>. . .</b></div>
                                <div
                                    class="pag-btn"><?= Html::a($post_pages, [Url::to(['news/all', 'page' => $post_pages])]) ?></div>
                            <?php endif ?>
                            <?php if (Yii::$app->request->get('page') != $post_pages): ?>
                                <div
                                    class="pag-btn"><?= Html::a('>', [Url::to(['news/all', 'page' => Yii::$app->request->get('page') + 1])]) ?></div>
                                <div
                                    class="pag-btn"><?= Html::a('>>', [Url::to(['news/all', 'page' => $post_pages])]) ?></div>
                            <?php endif ?>

                        <?php endif ?>
                    <?php endif ?>
                </div>

                <?php
        }
        if (Yii::$app->request->isAjax) {
            $this->layout = false;
            return $this->renderContent(null);
        } else {
            return $this->render('all', compact(
                'post_pages',
                'sliders',
                'categories',
                'categories_count',
                'categories_all',
                'posts',
                'authors',
                'tags'
            ));
        }
    }


    public function actionAuthor()
    {
        $author = Author::find()->all();

        return $this->render('author', compact('author'));
    }

    public function actionAllCategories()
    {
        return $this->render('all-categories');
    }
}