<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class FontAwesomeAsset extends AssetBundle
{
    public $basePath = '@bower/font-awesome';
    public $css = [
        'web-fonts-with-css/css/fontawesome.css',
    ];

}
