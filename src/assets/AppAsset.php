<?php

namespace app\basic\assets;

use yii\web\AssetBundle;

/**
 * AppAsset.
 *
 * Assets web application basic
 **/
class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/basic/assets/';

    public $css = [
        'css/site.css',
    ];

    public $js = [
    ];

    public $depends = [
        \yii\jquery\YiiAsset::class,
        \yii\bootstrap4\BootstrapAsset::class,
    ];
}
