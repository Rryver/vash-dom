<?php


namespace app\backend\controllers;


use app\backend\components\AdminController;
use Yii;
use yii\helpers\Url;

class EditorController extends AdminController
{
    const FILES_DIRECTORY = '/uploads/editor';

    public function actions()
    {
        return [
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => Url::home(true) . self::FILES_DIRECTORY, // Directory URL address, where files are stored.
                'path' => '@webroot' . self::FILES_DIRECTORY, // Or absolute path to directory where files are stored.
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => Url::home(true) . self::FILES_DIRECTORY, // Directory URL address, where files are stored.
                'path' => '@webroot' . self::FILES_DIRECTORY, // Or absolute path to directory where files are stored.
                'unique' => true,
                'replace' => true, // By default it throw an excepiton instead.
                'translit' => true,
            ],
            'file-delete' => [
                'class' => 'vova07\imperavi\actions\DeleteFileAction',
                'url' => Url::home(true) . self::FILES_DIRECTORY, // Directory URL address, where files are stored.
                'path' => '@webroot' . self::FILES_DIRECTORY, // Or absolute path to directory where files are stored.
            ],
        ];
    }
}