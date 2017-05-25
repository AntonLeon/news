<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
$logo = \app\models\Logo::find()->limit(1)->orderBy('id')->one();
if (empty ($logo)) {
    $logoHead = 'web/images/default/noimage_logo.png';
}
$links = \app\models\Footer::find()->orderBy('id DESC')->limit(9)->all();
$links_count = \app\models\Footer::find()->count();
?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img($logoHead, ['height' => '70px', 'width' => '100px']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/']],
            !Yii::$app->user->isGuest ? (
            ['label' => 'Admin panel', 'url' => ['/admin/']]
            ):
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer"  style="height: 80px;">
    <div class="container">
        <?php if (!empty ($logo)) { ?>
        <p class="pull-left"><?= Html::img($logo->logo_img, ['height' => '30px', 'width' => '70px']) ?></p>
        <?php } else { ?>
            <p class="pull-left"><?= Html::img('web/images/default/noimage_logo.png', ['height' => '30px', 'width' => '70px']) ?></p>
        <?php } ?>
        <ul style="margin-left: 100px; margin-top: -10px; height: 68px">
            <?php foreach ($links as $footer_link): ?>
            <li style="display: inline-block; width: 30%; text-align: left"><?= $footer_link->footer_link ?></li>
            <?php endforeach ?>
        </ul>
        <p class="pull-right"><?php ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
