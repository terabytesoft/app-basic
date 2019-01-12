<?php

return [
    // aplication:
	'app.id' => 'my-project-basic',
	'app.name' => 'My Project Basic',
    'adminEmail' => 'admin@example.com',
    'debug.allowedIPs' => ['127.0.0.1', '::1'],
    'favicon.ico' => '@yii/app/../public/favicon.ico',
    // mailer:
	'mailer.useFileTransport' => true,
    // translator:
    'i18n.locale' => 'en',
    'i18n.encoding' => 'UTF-8',
    'translator.basePath' => '@app/basic/messages',
    'translator.sourceLanguage' => 'en',
];
