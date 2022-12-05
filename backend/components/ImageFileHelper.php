<?php


namespace app\backend\components;


use yii\web\UploadedFile;

class ImageFileHelper
{
    public static function saveImage($model, $attributePath = 'image', $attributeFile = 'imageFile')
    {
        $imageFile = UploadedFile::getInstance($model, 'imageFile');
        if (is_object($imageFile)) {
            $path = 'uploads/' . $imageFile->baseName . '_' . time() . '.' . $imageFile->extension;
            if ($imageFile->saveAs($path)) {
                $model->image = "/" . $path;
            }
        }
    }
}