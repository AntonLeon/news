<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use \yii\helpers\Url;
use yii\helpers\StringHelper;

?>

<!--Слайдер-->
<div class="news-carousel owl-theme">
    <div class="slider-container owl-carousel">
        <?php foreach ($sliders as $slider): ?>
            <div class="owl-item">
                <div class="slider-image"><?= Html::a(Html::img($slider->header_img),
                        [Url::to(['news/view', 'post' => $slider->slug])]) ?></div>
                <div class="slider-title owl-dots"><?= $slider->title ?></div>
                <div class="slider-text owl-dots"><?= StringHelper::truncateWords($slider->text, 30, '...') ?></div>
            </div>
        <?php endforeach ?>
    </div>
    <span class="play glyphicon glyphicon-play"></span>
    <span class="stop glyphicon glyphicon-pause"></span>
</div>

<!--Разделяющая линия под слайдером-->
<p class="top-line"></p>

<!--Вывод всех категорий-->
<div class="btn-group" role="group" aria-label="..." style="margin-left: 20px; text-align: center">

    <div class="btn-group" role="group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            All
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <?php foreach ($categories_all as $category): ?>
                <li><a href="<?= Url::to(['news/category', 'id' => $category->id]) ?>"><?= $category->category_name ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>

    <?php foreach ($categories as $category): ?>
        <button type="button" class="btn btn-default"><a href="<?= Url::to(['news/category', 'id' => $category->id]) ?>"><?= $category->category_name ?></a></button>
    <?php endforeach ?>

</div>
<!--Разделяющая линия под слайдером-->
<p class="line"></p>

<div id="filter">
    <ul>
        <li>
            <label>-- Select author --</label>
            <ul id="author">
                <?php foreach ($authors as $author): ?>
                    <li class="item-style"><input name="<?= $author['author_name'] ?>" class="checkbox-author" type="checkbox" value="<?= $author['id'] ?>"> <?= $author['author_name'] ?></li>
                <?php endforeach ?>
            </ul>
        </li>
        <li>
            <label>-- Select tag --</label>
            <ul id="tag">
                <?php foreach ($tags as $tag): ?>
                    <li class="item-style"><input name="<?= $tag['tag'] ?>" class="checkbox-tag" type="checkbox" value="<?= $tag['id'] ?>"> <?= $tag['tag'] ?></li>
                <?php endforeach ?>
            </ul>
        </li>
        <li>
            <label>-- Sort by --</label>
            <ul id="sort-items">
                <li class="item-style"><input type="radio" class="radio-sort" name="sort-items" value="title ASC"> Ascending</li>
                <li class="item-style"><input type="radio" class="radio-sort" name="sort-items" value="title DESC"> Descendingly</li>
                <li class="item-style"><input type="radio" class="radio-sort" name="sort-items" value="date ASC"> Asc. by date</li>
                <li class="item-style"><input type="radio" class="radio-sort" name="sort-items" checked value="date DESC"> Desc. by date</li>
            </ul>

        </li>
    </ul>

    <div id="filter-values" style="border: 1px solid red; height: 50px">
        <div id="author-value"></div>
        <div id="tag-value"></div>
    </div>

</div>


<p class="line"></p>

<!--Вывод всех статей-->
<div id="result">
    <div class="all-posts" style="display: inline-block; height: auto; width: 1140px">
    <?php foreach ($posts as $key => $post): ?>
        <div class="all-posts-panel" style="box-shadow: 0 0 10px; float: left;  background-color: white; margin-left: 37px;  margin-top: 10px; border-left: 1px solid lightgray; border-right: 1px solid lightgray; border-bottom: 2px solid lightgray; width: 45%; height: 200px;">
            <div class="all-posts-panel-heading" style="width: 400px; height: auto; padding: 5px;float: right; border-top: 2px solid lightgray; max-height: 200px">
                <h4 class="all-posts-panel-title"><?= Html::a($post->title, [Url::to(['news/view', 'post' => $post->slug])]) ?></h4>
                <?= StringHelper::truncateWords($post->text, 15, '...') ?>
            </div>
            <div class="all-posts-panel-text"></div>
            <div class="all-posts-panel-img" style="padding-top: 20px; padding-left: 5px; float: left;">
                <?php if (file_exists('../'.$post->thumbnail_img)) {
                    echo Html::img('../'.$post->thumbnail_img, ['height' => '90px', 'width' => '100px']);
                } else {
                    echo Html::img('/web/uploads/images/default/noimage.png', ['height' => '90px', 'width' => '100px']);
                } ?>
            </div>
        </div>
    <?php endforeach ?>
    </div>

<!--Пагинация-->
<div class="all-posts-panel-pag row">
    <?php if ($post_pages > 1) : ?>
        <?php if ($post_pages < 5): ?>

            <?php if (Yii::$app->request->get('page') != 1): ?>
                <div class="pag-btn"><?= Html::a('<', [Url::to(['news/all', 'page' => Yii::$app->request->get('page') - 1])]) ?></div>
            <?php endif ?>

            <?php for($page = 1; $page <= $post_pages; $page++): ?>
                <?php if (Yii::$app->request->get('page') == $page): ?>
                       <div class="pag-btn" id="pag-btn-noneactive"><?= Html::a($page) ?></div>
                <?php else: ?>
                    <div class="pag-btn"><?= Html::a($page, [Url::to(['news/all', 'page' => $page])]) ?></div>
                <?php endif ?>
            <?php endfor ?>

            <?php if (Yii::$app->request->get('page') != $post_pages): ?>
                <div class="pag-btn"><?= Html::a('>', [Url::to(['news/all', 'page' => Yii::$app->request->get('page') + 1])]) ?></div>
            <?php endif ?>

        <?php else: ?>

            <?php if (Yii::$app->request->get('page') != 1): ?>
                <div class="pag-btn"><?= Html::a('<<', [Url::to(['news/all', 'page' => 1])]) ?></div>
                <div class="pag-btn"><?= Html::a('<', [Url::to(['news/all', 'page' => Yii::$app->request->get('page') - 1])]) ?></div>
            <?php endif ?>

            <?php for($page = Yii::$app->request->get('page'); $page <= 4 + Yii::$app->request->get('page'); $page++): ?>
                <?php if ($page < $post_pages): ?>
                    <?php if (Yii::$app->request->get('page') == $page): ?>
                        <div class="pag-btn" id="pag-btn-noneactive"><?= Html::a($page) ?></div>
                    <?php else: ?>
                        <div class="pag-btn"><?= Html::a($page, [Url::to(['news/all', 'page' => $page])]) ?></div>
                    <?php endif ?>
                <?php endif ?>
            <?php endfor ?>

            <?php if (Yii::$app->request->get('page')  < $post_pages): ?>
            <div class="pag-btn"><b>. . .</b></div>
            <div class="pag-btn"><?= Html::a( $post_pages, [Url::to(['news/all', 'page' => $post_pages])]) ?></div>
            <?php endif ?>
            <?php if (Yii::$app->request->get('page') != $post_pages): ?>
                <div class="pag-btn"><?= Html::a('>', [Url::to(['news/all', 'page' => Yii::$app->request->get('page') + 1])]) ?></div>
                <div class="pag-btn"><?= Html::a('>>', [Url::to(['news/all', 'page' => $post_pages])]) ?></div>
            <?php endif ?>

        <?php endif ?>
    <?php endif ?>
</div>


</div>
