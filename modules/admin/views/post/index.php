<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'post_id',
            'thumbnail_img:image',
//            'header_img',
            'title',
//            'text:ntext',
             'category_id',
             'date',
             'author_id',
             'tag_id',
             'actives',
            'post_featured',
//            'slug',

            ['class' => ActionColumn::className()],
        ],
    ]); ?>
</div>
