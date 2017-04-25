<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->post_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->post_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'post_id',
            'thumbnail_img:image',
            'header_img',
            'title',
            'text:ntext',
            'category_id',
            'date',
            'author_id',
            'tag_id',
            [
                'label' => 'Actives',
                'value' => $model->actives == 1 ? 'Yes' :  'No' ,
            ],
            [
                'label' => 'Feautered',
                'value' => $model->post_featured == 1 ? 'Yes' : 'No',
            ],
            'slug',
        ],
    ]) ?>

</div>
