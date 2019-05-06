<?php

use yii\di\Reference;

return [
    'app' => [
        'basePath' => dirname(__DIR__).'/src',
        'controllerNamespace' => 'Terabytesoft\App\Basic\Controllers',
    ],
    'aliases' => array_merge($aliases, [
        '__class'   => yii\base\Aliases::class,
        '@root'     => YII_ROOT,
        '@vendor'   => '@root/vendor',
        '@public'   => '@root/tests/public',
        '@runtime'  => '@public/runtime',
        '@web'      => '/',
    ]),
    'assetManager' => [
        '__class'   => yii\web\AssetManager::class,
        'basePath'  => '@public/assets',
        'baseUrl'   => '@web/assets',
    ],
];
