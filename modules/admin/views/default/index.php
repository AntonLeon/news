<?php

use yii\helpers\Url;
use yii\widgets\DetailView;

?>


<div class="admin-default-index" style="margin-top: 50px; margin-left: -70px;">
    <ul class="nav nav-pills nav-stacked" style="width: 20%;">
        <li role="presentation"><a href="<?= Url::to(['home/']) ?>">Manage homepage</a></li>
        <li role="presentation"><a href="<?= Url::to(['post/']) ?>">Manage posts</a></li>
        <li role="presentation"><a href="<?= Url::to(['tag/']) ?>">Manage tags</a></li>
        <li role="presentation"><a href="<?= Url::to(['author/']) ?>">Manage authors</a></li>
        <li role="presentation"><a href="<?= Url::to(['category/']) ?>">Manage categories</a></li>
    </ul>
</div>

<div class="details" style="margin-left: 200px; margin-top: -200px">
<?php
echo DetailView::widget([
    'model' => $posts,
    'attributes' => [
        [                                                  // name свойство зависимой модели owner
            'label' => 'All posts',
            'value' => $posts,
            'contentOptions' => ['class' => 'bg-red', 'width' => '100px'],     // настройка HTML атрибутов для тега, соответсвующего value
            'captionOptions' => ['tooltip' => 'Tooltip'],  // настройка HTML атрибутов для тега, соответсвующего label
        ],
    ],
]);

echo DetailView::widget([
    'model' => $authors,
    'attributes' => [
        [                                                  // name свойство зависимой модели owner
            'label' => 'All authors',
            'value' => $authors,
            'contentOptions' => ['class' => 'bg-red', 'width' => '100px'],     // настройка HTML атрибутов для тега, соответсвующего value
            'captionOptions' => ['tooltip' => 'Tooltip'],  // настройка HTML атрибутов для тега, соответсвующего label
        ],
    ],
]);

echo DetailView::widget([
    'model' => $categories,
    'attributes' => [
        [                                                  // name свойство зависимой модели owner
            'label' => 'All categories',
            'value' => $categories,
            'contentOptions' => ['class' => 'bg-red', 'width' => '100px'],     // настройка HTML атрибутов для тега, соответсвующего value
            'captionOptions' => ['tooltip' => 'Tooltip'],  // настройка HTML атрибутов для тега, соответсвующего label
        ],
    ],
]);

if ($logo > 0) {
    $logo = 'Yes';
} else {
    $logo = 'No';
}

echo DetailView::widget([
    'model' => $logo,
    'attributes' => [
        [                                                  // name свойство зависимой модели owner
            'label' => 'Logo',
            'value' => $logo,
            'contentOptions' => ['class' => 'bg-red', 'width' => '100px'],     // настройка HTML атрибутов для тега, соответсвующего value
            'captionOptions' => ['tooltip' => 'Tooltip'],  // настройка HTML атрибутов для тега, соответсвующего label
        ],
    ],
]);

?>

</div>