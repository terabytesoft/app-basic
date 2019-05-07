<?php

use hiqdev\composer\config\Builder;
use yii\di\Container;
use yii\helpers\Yii;

// ensure we get report on all possible php errors
error_reporting(-1);
define('YII_ENABLE_ERROR_HANDLER', false);
define('YII_DEBUG', true);
define('YII_ENV', 'test');

(function () {
    $composerAutoload = __DIR__ . '/../vendor/autoload.php';
    if (!is_file($composerAutoload)) {
        die('You need to set up the project dependencies using Composer');
    }
    require_once $composerAutoload;
    $container = new Container(require Builder::path('codecept'));
    Yii::setContainer($container);
})();
