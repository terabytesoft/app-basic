<?php


return [
    'app' => [
        'basePath'            => dirname(__DIR__).'/src',
        'controllerNamespace' => 'TerabyteSoft\App\Basic\Controllers',
    ],
    'cache' => [
        '__class' => Yiisoft\Cache\Cache::class,
        'handler' => [
            '__class'   => Yiisoft\Cache\FileCache::class,
            'keyPrefix' => 'my-project-basic',
        ],
    ],
    'logger' => function () {
        return new \Yiisoft\Log\Logger([
            new \Yiisoft\Log\FileTarget('/tmp/log.txt')
        ]);
    },
    'mailer' => [
        '__class'          => Yiisoft\Yii\SwiftMailer\Mailer::class,
        'useFileTransport' => $params['mailer.useFileTransport'],
    ],
    'translator' => [
        'translations' => [
            'basic' => [
                '__class'        => yii\i18n\PhpMessageSource::class,
                'sourceLanguage' => $params['translator.sourceLanguage'],
                'basePath'       => $params['translator.basePath'],
            ],
        ],
	],
    'theme' => [
        'pathMap' => [
            '@app/views/layouts' => '@TerabyteSoft/App/Basic/Views/Layouts',
            '@app/views/site' => '@TerabyteSoft/App/Basic/Views/Site',
        ],
    ],
];
