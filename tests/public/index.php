<?php

use hiqdev\composer\config\Builder;
use yii\di\Container;
use yii\helpers\Yii;

include '../../c3.php';

define('MY_APP_STARTED', true);

// ensure we get report on all possible php errors
error_reporting(-1);
define('YII_ENABLE_ERROR_HANDLER', true);
define('YII_DEBUG', true);
define('YII_ENV', 'test');

(function () {
    require_once __DIR__ . '/../../vendor/autoload.php';
    $container = new Container(require Builder::path('codecept'));
    Yii::setContainer($container);
    $container->get('app')->run();
})();
