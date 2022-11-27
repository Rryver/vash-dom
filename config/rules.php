<?php

return [
    'api/v1/<controller:\w+>/<action:\w+>/<id:\d+>' => 'api-v1/<controller>/<action>',
    'api/v1/<controller:\w+>/<action:\w+>' => 'api-v1/<controller>/<action>',


    /* ADMIN */

    'admin/<controller:\w+>/<id:\d+>' => 'admin/<controller>/<view>',
    'admin/<controller:\w+>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',
    'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
];