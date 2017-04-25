<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Tag;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Category;
use app\modules\admin\models\Author;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=cy2n77qasaumqwem4hl8y0mu3p4irx9kf5jqvvkg65elshwt	"></script>
<script>tinymce.init({
        selector:'textarea'
    });
</script>


<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'actives')->checkbox() ?>

    <?= $form->field($model, 'post_featured')->checkbox() ?>

    <?= $form->field($model, 'post_image')->fileInput() ?>

    <?= Html::img($model->thumbnail_img) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'category_name')) ?>

    <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map(Author::find()->all(), 'id', 'author_name')) ?>

    <?= $form->field($model, 'tag_id')->dropDownList(ArrayHelper::map(Tag::find()->all(), 'id', 'tag')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
