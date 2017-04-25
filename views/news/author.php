<?php

use yii\helpers\Html;

?>

<div class="author-container">
    <div class="author-aboute"><?= $author[0]->author_name ?></div>
    <div class="author-photo"><?= Html::img($author[0]->author_img) ?></div>
</div>
