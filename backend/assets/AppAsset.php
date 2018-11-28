<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/nucleo-icons.css',
        'css/black-dashboard.css',
    ];
    public $js = [
        'js/core/popper.min.js',
        'js/core/bootstrap.min.js',
        'js/plugins/perfect-scrollbar.jquery.min.js',
        'js/plugins/chartjs.min.js',
        'js/plugins/bootstrap-notify.js',
        'js/black-dashboard.min.js?v=1.0.0',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
