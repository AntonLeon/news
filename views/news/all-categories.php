<?php


$t = Yii::$app->formatter->asDatetime('now', "php:d-m-Y, H:i");
echo "<br>".$t;
