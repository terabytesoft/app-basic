<?php

$params = $params ?? [];

return [
    'app' => [
        'basePath'            => dirname(__DIR__).'/src',
        'controllerNamespace' => 'TerabyteSoft\App\Basic\Controllers',
    ],
    'cache' => [
        '__class' => Yiisoft\Cache\Cache::class,
        'handler' => [
            '__class'   => Yiisoft\Cache\FileCache::class,
            'keyPrefix' => 'AppBasic'
        ],
    ],
    'file-rotator' => [
        '__class' => Yiisoft\Log\FileRotator::class,
        '__construct()' => [
            10
        ]
    ],
    'logger' => static function (\yii\di\Container $container) {
        /** @var \yii\base\Aliases $aliases */
        $aliases = $container->get('aliases');
        $fileTarget = new \Yiisoft\Log\FileTarget(
            $aliases->get('@runtime/logs/app.log'),
            $container->get('file-rotator')
        );
        return new \Yiisoft\Log\Logger([
            'file' => $fileTarget->setCategories(
                ['application']
            ),
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
