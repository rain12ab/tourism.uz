<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AwesomeAsset extends AssetBundle
{
    public $sourcePath = '@bower/font-awesome/';
    public $css = [
        'css/all.css',
    ];

    public $js = [
        'js/all.js',
    ];
}
