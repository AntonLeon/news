<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Footer */

$this->title = 'Update Footer: ' . $model->footer_title;
$this->params['breadcrumbs'][] = ['label' => 'Footers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->footer_title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="footer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
