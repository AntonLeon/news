<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/site.css',
        'css/my.css',
        'css/dropdown.css'
//        'css/filters.css',

    ];
    public $js = [
        'js/owl.carousel.js',
        'js/slider.js',
        'js/featuredSlider.js',
        'js/filters.js',
//        'js/load.js',
        'js/click.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
