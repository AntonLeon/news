<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Post;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'slider_active')->checkbox() ?>

    <?= $form->field($model, 'slider_file')->fileInput() ?>

    <?= Html::img($model->slider_img) ?>

    <?= $form->field($model, 'slider_title')->textInput() ?>

    <?= $form->field($model, 'slider_text')->textarea() ?>

    <?= $form->field($model, 'slider_url')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
