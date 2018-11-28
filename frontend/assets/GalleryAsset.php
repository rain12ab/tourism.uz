<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class GalleryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'gallery/css/main.css',

    ];
    public $js = [
        'gallery/js/jquery.scrolly.min.js',
        'gallery/js/browser.min.js',
        'gallery/js/breakpoints.min.js',
        'gallery/js/util.js',
        'gallery/js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
