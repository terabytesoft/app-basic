<?php

return [
    'app' => [
        'controllerNamespace' => app\basic\controllers::class,
    ],
    'user' => [
        'identityClass' => app\basic\models\UserModels::class, // User must implement the IdentityInterface
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
