<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Footers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="footer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Footer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'footer_link',
            'footer_title',
            'footer_url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
