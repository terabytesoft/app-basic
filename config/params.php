<?php

return [
    // aplication:
    'favicon.ico' => '@yii/app/../public/favicon.ico',
    // cookie validation:
    'enableCookieValidation' => true,
    'cookieValidationKey'    => 'AppBasic',
    // debug:
    'debug.allowedIPs' => ['127.0.0.1', '::1', '*'],
    'debug.enabled' => false,
    // mailer:
    'mailer.useFileTransport' => true,
    // translator:
    'i18n.locale'               => 'en',
    'i18n.encoding'             => 'UTF-8',
];
