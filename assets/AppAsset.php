<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap',
        'vendor/bootstrap-5.0.2-dist/css/bootstrap.min.css',
        'vendor/fancybox/jquery.fancybox.min.css',
        'vendor/slick/slick.css',
        'vendor/slick/slick-theme.css',
        //'css/site.css',
        'css/normalize.css',
        'css/style.css',
    ];
    public $js = [
        //'vendor/jquery/jquery-3.3.1.min.js',
        'vendor/bootstrap-5.0.2-dist/js/bootstrap.min.js',
        'vendor/fancybox/jquery.fancybox.min.js',
        'vendor/slick/slick.min.js',
        'vendor/mask/jquery.mask.min.js',
        'vendor/object-fit/ofi.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
