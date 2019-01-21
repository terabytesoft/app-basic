<?php

use yii\base\Aliases;
use yii\di\Reference;

return [
    'app' => [
        'basePath' => dirname(__DIR__) . '/src',
        'controllerNamespace' => 'app\basic\controllers',
    ],
    'cache' => [
        '__class' => yii\cache\Cache::class,
        'handler' => [
            '__class' => yii\cache\FileCache::class,
            'keyPrefix' => 'my-project-basic',
        ],
    ],
    'logger' => [
        '__construct()' => [
            'targets' => [
                [
                    '__class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'mailer' => [
        '__class' => yii\swiftmailer\Mailer::class,
        'useFileTransport' => $params['mailer.useFileTransport'],
    ],
    'translator' => [
        'translations' => [
            'basic' => [
                '__class' => yii\i18n\PhpMessageSource::class,
                'sourceLanguage' => $params['translator.sourceLanguage'],
                'basePath' => $params['translator.basePath'],
            ],
        ],
    ],
];
