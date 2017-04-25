<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'banner_file')->fileInput() ?>

    <?= Html::img($model->banner_img)?>

    <?= $form->field($model, 'banner_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'banner_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
