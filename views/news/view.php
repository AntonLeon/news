
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;


$this->title = Html::encode($post->title)?>

<?php $this->beginBody() ?>

<!--Header-->
<div class="header-view">
    <div class="header-container">
        <div class="header-image"><?= Html::img('../'.$post->header_img) ?></div>
        <div class="header-title"><?= $post->title ?></div>
        <div class="header-text"><?= StringHelper::truncateWords($post->text, 15, '...') ?></div>
    </div>
</div>

<!--Разделяющая линия под слайдером-->
<p class="line"></p>

<!--Вывод всех категорий-->
<div class="btn-group" role="group" aria-label="..." style="margin-left: 20px; text-align: center">

    <div class="btn-group" role="group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            All
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <?php foreach ($categories_all as $category_all): ?>
                <li><a href="<?= Url::to(['news/category', 'id' => $category_all->id]) ?>"><?= $category_all->category_name ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>

    <?php foreach ($categories as $category): ?>
        <button type="button" class="btn btn-default"><a href="<?= Url::to(['news/category', 'id' => $category->id]) ?>"><?= $category->category_name ?></a></button>
    <?php endforeach ?>

</div>

<!--Разделяющая линия под слайдером-->
<p class="top-line"></p>

<div class="post-container" style="padding: 20px;">
    <div class="post-header" style="box-shadow: 0 0 10px; border-left: 1px solid lightgrey; border-bottom: 2px solid grey; border-right: 1px solid lightgray; border-top: 1px solid lightgray;">

        <div class="post-date"  style="color: white; text-align: right; padding-right: 20px; background-color: grey;">
            <?= Yii::$app->formatter->asDatetime($post->date, "php:d-m-Y") ?>
        </div>
        <div class="post-category"  style="text-align: right; padding-right: 20px; background-color: grey;">
            <a style="color: white;" href="<?=Url::to(['news/category', 'id' => $post->category_id])?>"><?= $post->categories->category_name ?></a>
        </div>

        <div class="post-title" style="padding: 20px; text-align: center">
            <h3><?= $post->title ?></h3>
        </div>

        <div class="post-content">
            <div class="post-image" style=" text-align: center; padding: 30px;">
                <?php if (file_exists('../'.$post->thumbnail_img)) {
                    echo Html::img('../'.$post->thumbnail_img);
                } else {
                    echo Html::img('../web/uploads/images/default/noimage.png');
                } ?>
            </div>
            <div class="post-text" style=" padding: 50px; border-bottom: 1px solid lightgrey; border-top: 1px solid lightgrey; width: 98%; margin-left: 10px">
                <?= $post->text ?>
            </div>
            <div class="post-author" style="text-align: right; padding-right: 10px">
                <h4>Author: <a href="<?= Url::to(['news/author', 'id' => $post->author_id]) ?>"><?=$post->authors->author_name ?></a></h4>
            </div>
        </div>
    </div>

</div>
<?php $this->endBody() ?>
</body>
