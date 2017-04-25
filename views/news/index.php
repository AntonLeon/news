<?php

use yii\helpers\Html;

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;


?>

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

<div id="result">
    <div class="all-posts" style="display: inline-block; height: auto; width: 1140px">
        <?php foreach ($al as $key => $post): ?>
            <div class="all-posts-panel" style="box-shadow: 0 0 10px; float: left;  background-color: white; margin-left: 37px;  margin-top: 10px; border-left: 1px solid lightgray; border-right: 1px solid lightgray; border-bottom: 2px solid lightgray; width: 45%; height: 200px;">
                <div class="all-posts-panel-heading" style="width: 400px; height: auto; padding: 5px;float: right; border-top: 2px solid lightgray; max-height: 200px">
                    <h4 class="all-posts-panel-title"><?= Html::a($post['title'], [\yii\helpers\Url::to(['news/view', 'id' => $post['post_id']])]) ?></h4>
                    <?= \yii\helpers\StringHelper::truncateWords($post['text'], 20, '...') ?>
                </div>
                <div class="all-posts-panel-text"></div>
                <div class="all-posts-panel-img" style="padding-top: 20px; padding-left: 5px; float: left;">
                    <?php if (file_exists('../'.$post['thumbnail_img'])) {
                        echo Html::img('../'.$post['thumbnail_img'], ['height' => '90px', 'width' => '100px']);
                    } else {
                        echo Html::img('/web/uploads/images/default/noimage.png', ['height' => '90px', 'width' => '100px']);
                    } ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

