<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class FontAwesomeAsset extends AssetBundle
{
    public $basePath = '@bower/bower-asset/font-awesome';
    public $css = [
        'css/font-awesome.min.css',
    ];

}
