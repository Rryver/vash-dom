<?php

return [
    'api/v1/<controller:\w+>/<action:\w+>/<id:\d+>' => 'api-v1/<controller>/<action>',
    'api/v1/<controller:\w+>/<action:\w+>' => 'api-v1/<controller>/<action>',

    'works' => 'projects/works',
    'promo' => 'site/promo',
    'about' => 'site/about',
    'contacts' => 'site/contacts',

    'messageSuccess' => 'message/success',
    'messageError' => 'message/error',

    'page/<slug>' => 'page/view',

    /* ADMIN */
    'admin/index' => 'admin/message',
    'admin' => 'admin/message',

    'admin/<controller:\w+>/<id:\d+>' => 'admin/<controller>/<view>',
    'admin/<controller:\w+>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',
    'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
];