<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;


$this->title = 'News';

?>

<div class="news">

<!--Слайдер-->
    <div class="news-carousel owl-theme">
        <div class="slider-container owl-carousel">
            <?php foreach ($sliders as $slider): ?>
                <div class="owl-item">
                    <div class="slider-image"><?= Html::a(Html::img($slider->slider_img), [$slider->slider_url]) ?></div>
                    <div class="slider-title owl-dots"><?= $slider->slider_title ?></div>
                    <div class="slider-text owl-dots"><?= StringHelper::truncateWords($slider->slider_text, 30, '...') ?></div>
                </div>
            <?php endforeach ?>
        </div>
        <span class="play glyphicon glyphicon-play"></span>
        <span class="stop glyphicon glyphicon-pause"></span>
    </div>

<!--Разделительная линия-->
    <p class="top-line"></p>

    <div class="news-latest-all">

<!--Последняя главная новость (вывод с левой стороны)-->
        <div class="news-item row"  style="margin-left: 5px">

            <div class="news-latest-item">
                <div class="news-latest-item-img">
                    <?= Html::img($latestPost[0]->thumbnail_img, ['width' => '437px']) ?>
                </div>

                <div class="news-latest-item-title" style="padding-top: 20px; text-align: center;">
                    <h3><?= $latestPost[0]->title ?></h3>
                </div>

                <div class="news-latest-item-text" style="padding-top: 20px;">
                    <?= StringHelper::truncateWords($latestPost[0]->text, 50, '...') ?>
                </div>

                <div class="news-latest-item-link btn btn-default">
                    <a href="<?= Url::to(['news/view', 'post' => $latestPost[0]->slug]) ?>">Read more...</a>
                </div>
            </div>

<!--Список последних новостей (вывод с правой стороны)-->
            <div class="news-latest row">
                <?php foreach ($latestPosts as $post): ?>

                    <div class="news-latest-header">
                        <?php if (file_exists('../'.$post->thumbnail_img)) {
                            echo Html::img('../'.$post->thumbnail_img, ['height' => '90px', 'width' => '100px']);
                        } else {
                            echo Html::img('../web/uploads/images/default/noimage.png', ['height' => '90px', 'width' => '100px']);
                        } ?>
                        <div class="news-latest-button btn btn-default">
                            <?= Html::a('Read more...', [Url::to(['news/view', 'post' => $post->slug])]) ?>
                        </div>

                    <div class="news-latest-title">
                         <h4><?= $post->title ?></h4>
                    </div>

                    <div class="news-latest-text">
                        <?= StringHelper::truncateWords($post->text, 15, '...') ?>
                    </div>
                        </div>

                <?php endforeach ?>

            </div>

        </div>
        <?= Html::a('See all', Url::to(['news/all', 'page' => 1]), ['class' => 'news-latest-link btn btn-success']) ?>
    </div>

<!---->
        <div class="news-featured">
        <?php foreach ($featuredNews as $news): ?>
        <div class="news-featured-item row">
            <?php if (file_exists('../'.$news->thumbnail_img)) {
                echo Html::img('../'.$news->thumbnail_img, ['class' => 'news-featured-item-img', 'height' => 'auto', 'width' => '230px']);
            } else {
                echo Html::img('/web/uploads/images/default/noimage.png', ['height' => '80px', 'width' => '100px']);
            } ?>
            <div class="news-featured-title"><b><?= StringHelper::truncateWords($news->title, 20, '...') ?></b></div>
            <div class="news-featured-button btn btn-default">
                <?= Html::a('Read more...', [Url::to(['news/view', 'post' => $news->slug])]) ?>
            </div>
        </div>
        <?php endforeach ?>
            <?= Html::a('See all', Url::to(['news/all', 'page' => 1]), ['class' => 'news-featured-link btn btn-success']) ?>

        </div>

    <div style="border: 1px solid red; margin-top: 30px"></div>

<!--Баннеры-->
            <div class="news-banner">
                <?php foreach ($banners as $banner): ?>
                        <div class="news-banner-container">
                                <?php if (file_exists('..'.$banner->banner_img)) {
                                    echo Html::a(Html::img('..'.$banner->banner_img, ['class' => 'news-banner-img', 'height' => '160px', 'width' => '50%']), $banner->banner_url);
                                } else {
                                    echo Html::img('../web/uploads/images/default/noimage.png', ['class' => 'news-banner-img', 'height' => '160px', 'width' => '50%']);
                                } ?>
                            <div class="news-banner-item">
                                <?=$banner->banner_title?>
                            </div>
                        </div>
                <?php endforeach ?>
            </div>

    </div>
