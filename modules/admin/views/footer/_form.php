<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Footer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="footer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'footer_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'footer_title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
