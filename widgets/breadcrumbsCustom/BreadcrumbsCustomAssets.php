<?php

namespace app\widgets\breadcrumbsCustom;

use yii\web\AssetBundle;

class BreadcrumbsCustomAssets extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets';
    public $css = [
        'main.css',
    ];

    public $js = [
        'main.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}