<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',

    'phone-regex' => '/^\+7 \(9\d{2}\) \d{3}\-\d{2}\-\d{2}$|^79\d{9}$/', //+7 (911) 111-11-11 или 79111111111

    'bsVersion' => '5.x',


    'imperavi-redactor-settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'imageUpload' => '/admin/editor/image-upload',
        'imageDelete' => '/admin/editor/file-delete',
        'imageManagerJson' => '/admin/editor/images-get',
        'plugins' => [
            'clips',
            'fontcolor',
            'fontsize',
            'fullscreen',
            'imagemanager' => 'vova07\imperavi\bundles\ImageManagerAsset',
            'table',
            'video',
            //Дополнительные плагины
//                'textdirection',

            //Дополнительные плагины. Но после включения ничего не меняется. Пока не понятно что они делают
//                'limiter',
//                'counter',
//                'definedlinks',
//                'filemanager',
//                'textpander',
        ],
        'clips' => [
            ['Красный текст', '<span class="text-color-red">Введите текст здесь</span>'],
        ],
    ],
];
