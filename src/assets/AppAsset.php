<?php

namespace Terabytesoft\App\Basic\Assets;

use yii\web\AssetBundle;

/**
 * AppAsset.
 *
 * Assets web application basic
 **/
class AppAsset extends AssetBundle
{
    public $sourcePath = '@Terabytesoft/App/Basic/Assets/';

    public $css = [
        'css/site.css',
    ];

    public $js = [
    ];

    public $depends = [
        \Yiisoft\Yii\JQuery\YiiAsset::class,
        \Yiisoft\Yii\Bootstrap4\BootstrapAsset::class,
    ];
}
