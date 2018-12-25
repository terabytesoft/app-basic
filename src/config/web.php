<?php

/**
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 *        @link: https://github.com/terabytesoft/app-basic
 *      @author: Wilmer Arámbula <terabytesoftw@gmail.com>
 *   @copyright: (c) TERABYTE SOFTWARE SA
 *       @views: config[web]
 *       @since: 0.0.1
 *         @yii: 3.0
 **/

return [
    'app' => [
        'controllerNamespace' => app\basic\controllers::class,
    ],
    'user' => [
        'identityClass' => app\basic\forms\UserForm::class, // User must implement the IdentityInterface
    ],
    'request' => [
        'enableCookieValidation' => false,
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => '',
    ],
    'assetManager' => [
        'appendTimestamp' => true,
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
    ],
];
