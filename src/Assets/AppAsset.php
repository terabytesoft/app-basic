<?php

namespace TerabyteSoft\App\Basic\Assets;

use yii\web\AssetBundle;

/**
 * AppAsset.
 *
 * Assets web application basic
 **/
class AppAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/Css';

    public $css = [
        'Site.css',
    ];

    public $js = [
    ];

    public $depends = [
        \Yiisoft\Yii\JQuery\YiiAsset::class,
        \Yiisoft\Yii\Bootstrap4\BootstrapAsset::class,
    ];
}
