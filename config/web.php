<?php

return [
    'app' => [
        'controllerNamespace' => 'app\basic\controllers',
    ],
    'assetManager' => [
        'appendTimestamp' => true,
    ],
    'request' => [
        'enableCookieValidation' => $params['enableCookieValidation'],
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => $params['cookieValidationKey'],
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName'  => false,
	],
    'user' => [
        'identityClass' => yii\web\User::class, // User must implement the IdentityInterface
    ],
];
