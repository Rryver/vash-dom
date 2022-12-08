<?php

use app\models\Page;
use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\helpers\Url;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Ваш дом',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\backend\AdminModule',
        ],
//        'settings' => [
//            'class' => 'yii2mod\settings\Module',
//        ],
        'sitemap' => [
            'class' => 'himiklab\sitemap\Sitemap',
            'models' => [
                // or configuration for creating a behavior
                [
                    'class' => 'app\models\Page',
                    'behaviors' => [
                        'sitemap' => [
                            'class' => SitemapBehavior::className(),
                            'scope' => function ($model) {
                                /** @var \yii\db\ActiveQuery $model */
                                $model->select(['slug', 'updated_at']);
                                $model->andWhere(['visible' => Page::VISIBLE]);
                            },
                            'dataClosure' => function ($model) {
                                /** @var Page $model */
                                return [
                                    'loc' => Url::to('/page/' . $model->slug, true),
                                    'lastmod' => strtotime($model->updated_at),
                                    'changefreq' => SitemapBehavior::CHANGEFREQ_WEEKLY,
                                    'priority' => 0.5,
                                ];
                            }
                        ],
                    ],
                ],
            ],
            'urls'=> [
                // your additional urls
                [
                    'loc' => '/',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => 'our-works',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => 'promo',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_WEEKLY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => 'contacts',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_MONTHLY,
                    'priority' => 0.8,
                ],
            ],
            'enableGzip' => true, // default is false
            'cacheExpire' => 1, // 1 second. Default is 24 hours
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qweasdzxc',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => false,

            'transport' => [
                'scheme' => 'smtps',
                'host' => 'smtp.yandex.com',
                'username' => 'ryver.mailer@yandex.ru',
                'password' => 'ihwwerbyexvjhmxr',
                'port' => 465,
                //'dsn' => 'native://default',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error'],

                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => file_exists(__DIR__. '/' . 'rules.php') ? require_once(__DIR__ . '/' . 'rules.php') : [],
        ],
        'settings' => [
            'class' => 'yii2mod\settings\components\Settings',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app'       => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
                'yii2mod.settings' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/settings/messages',
                ],
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
