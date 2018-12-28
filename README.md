<p align="center">
    <a href="https://github.com/terabytesoft/app-basic" target="_blank">
        <img src="https://farm1.staticflickr.com/887/27875183957_69a3645a56_q.jpg" height="100px;">
    </a>
    <h1 align="center">Yii 3.0 Web Application Basic</h1>
    <br>
</p>

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/)
[![Build Status](https://scrutinizer-ci.com/g/terabytesoft/app-basic/badges/build.png?b=master)](https://scrutinizer-ci.com/g/terabytesoft/app-basic/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/terabytesoft/app-basic/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/terabytesoft/app-basic/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/terabytesoft/app-basic/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Maintainability](https://api.codeclimate.com/v1/badges/fe720f0219c23dc3e237/maintainability)](https://codeclimate.com/github/terabytesoft/app-basic/maintainability)
[![Total Downloads](https://poser.pugx.org/terabytesoft/app-basic/downloads)](https://packagist.org/packages/cjtterabytesoft/app)


App Web Application Basic of Yii Version 3.0 [Yii Framework](http://www.yiiframework.com/) application best for rapidly creating projects with Bootstrap 4.

The template contains the basic features including:

- [x] User Functions - [Screenshots]:
    - [signup](docs/images/signup.png)
    - [login](docs/images/login.png)
    - [logout](docs/images/logout.png)
    - [request password reset](docs/images/request-paswword-reset.png)
    - [reset password](docs/images/reset-password.png)

- [x] Pages - [Screenshots]:
    - [index](docs/images/index.png)
    - [about](docs/images/about.png)
    - [contact](docs/images/contact.png)

It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

DIRECTORY STRUCTURE
-------------------

```
config/             contains application configurations
docs/               contains documentation app-basic
src/
  assets/           contains assets definition
  commands/         contains console commands (controllers)
  controllers/      contains Web controller classes
  forms/            contains models forms classes  
  mail/             contains view files for e-mails
  messages/         contains messages translate application 
  models/           contains model classes
  views/            contains view files for the Web application
tests/              contains various tests for the basic application
vendor/             contains dependent 3rd-party packages
```

REQUIREMENTS
------------
 
The minimum requirement by this project template that your Web server supports PHP 7.1.

INSTALLATION
------------

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist --stability=dev terabytesoft/app-template-basic myapp
~~~

Now you should be able to access the application through the following URL, assuming `public` is the directory
directly under the Web root.

**App Web Application Basic (terabytesoft/app-basic) is installed automatically together with the Web Project Skeleton Application Basic (terabytesoft/app-template-basic), both try the necessary packages to start your Web Application Basic in Yii3.** 

~~~
http://localhost/
~~~

CONFIGURATION
-------------

### APP-BASIC SETUP DEFAULT:

- **config/common.php:**

```php

return [
    'app' => [
        'basePath' => dirname(__DIR__) . '/src',
        'controllerNamespace' => app\basic\commands::class,
        /*
        'controllerMap' => [
            'fixture' => [ // Fixture generation command line.
                '__class' => 'yii\faker\FixtureController',
            ],
        ],
        */
    ],
    'logger' => [
        '__construct()' => [
            'targets' => [
                [
                    '__class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'cache' => [
        '__class' => yii\cache\Cache::class,
        'handler' => [
            '__class' => yii\cache\FileCache::class,
            'keyPrefix' => 'my-project',
        ],
    ],
    'mailer' => [
        '__class' => yii\swiftmailer\Mailer::class,
    ],
    'db' => array_filter([
        '__class' => yii\db\Connection::class,
        'dsn' => $params['db.dsn'],
        'username' => $params['db.username'],
        'password' => $params['db.password'],
        'enableSchemaCache' => defined('YII_ENV') && YII_ENV !== 'dev',
    ]),
    'translator' => [
        'translations' => [
            'basic' => [
                '__class' => yii\i18n\PhpMessageSource::class,
                'sourceLanguage' => 'en-US',
                'basePath' => '@app/basic/messages',
            ],
        ],
    ],
];
```

- **config/console.php:**

```php

return [
    'app' => [
        'controllerNamespace' => app\basic\commands::class,
    ],
];
```

- **config/env.php:**

```php

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
```

- **config/messages.php:**

```php

return [
    // string, required, root directory of all source files
    'sourcePath' => dirname(__DIR__) . '/src',
    // array, required, list of language codes that the extracted messages
    // should be translated to. For example, ['zh-CN', 'de'].
    'languages' => ['en'],
    // string, the name of the function for translating messages.
    // Defaults to 'Yii::t'. This is used as a mark to find the messages to be
    // translated. You may use a string for single function name or an array for
    // multiple function names.
    'translator' => 'Yii::t',
    // boolean, whether to sort messages by keys when merging new messages
    // with the existing ones. Defaults to false, which means the new (untranslated)
    // messages will be separated from the old (translated) ones.
    'sort' => true,
    // boolean, whether to remove messages that no longer appear in the source code.
    // Defaults to false, which means each of these messages will be enclosed with a pair of '@@' marks.
    'removeUnused' => false,
    // array, list of patterns that specify which files (not directories) should be processed.
    // If empty or not set, all files will be processed.
    // Please refer to "except" for details about the patterns.
    'only' => ['*.php'],
    // array, list of patterns that specify which files/directories should NOT be processed.
    // If empty or not set, all files/directories will be processed.
    // A path matches a pattern if it contains the pattern string at its end. For example,
    // '/a/b' will match all files and directories ending with '/a/b';
    // the '*.svn' will match all files and directories whose name ends with '.svn'.
    // and the '.svn' will match all files and directories named exactly '.svn'.
    // Note, the '/' characters in a pattern matches both '/' and '\'.
    // See helpers/FileHelper::findFiles() description for more details on pattern matching rules.
    // If a file/directory matches both a pattern in "only" and "except", it will NOT be processed.
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hg',
        '.hgignore',
        '.hgkeep',
        '/messages',
        '/migrations',
    ],
    // 'php' output format is for saving messages to php files.
    'format' => 'php',
    // Root directory containing message translations.
    'messagePath' => dirname(__DIR__) . '/src/messages',
    // boolean, whether the message file should be overwritten with the merged messages
    'overwrite' => true,
    // Message categories to ignore
    'ignoreCategories' => [
        'yii',
    ],
];
```

- **config/params.php:**

```php

return [
    'app.id' => 'my-project',
    'app.name' => 'MyProject',
    'adminEmail' => 'admin@example.com',
    'favicon.ico' => '@yii/app/../public/favicon.ico',
];
```

- **config/web.php:**

```php

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
```

### WEB SERVER SUPPORT:

- Apache.
- Nginx.
- OpenLiteSpeed.

DOCUMENTATION STYLE GUIDE
-------------------------

This extension follows the documentation described in [Yii Documentation Style Guide](https://github.com/yiisoft/yii2/blob/master/docs/documentation_style_guide.md).


### HOW TO USE RULES CODING STANDARD WITH VSCODE:

- Install squizlabs/php_codesniffer, friendsofphp/php-cs-fixer global:

```
composer global require "squizlabs/php_codesniffer >=2.3.1 <3.0"
composer global require friendsofphp/php-cs-fixer
```

- Copy directory /vendor/yiisoft/yii2-conding-standards/Yii2 to directory path composer global example windows C:\Users\user\AppData\Roaming\Composer\vendor\squizlabs\php_codesniffer\CodeSniffer\Standards

- Add config Vscode:

```
{
    "editor.detectIndentation": false,
    "files.eol": "\n",
    "phpcs.standard": "Yii2",
    "php-cs-fixer.executablePath": "php-cs-fixer",
    "php-cs-fixer.executablePathWindows": "php-cs-fixer.bat",
    "php-cs-fixer.config": ".php_cs;.php_cs.dist",
    "php-cs-fixer.allowRisky": true,
}
```

**LICENSE:**

[![License](https://poser.pugx.org/terabytesoft/app-basic/license)](https://packagist.org/packages/cjtterabytesoft/app)


**NOTES:**

- Check and edit the other files in the `config/` directory to customize your application as required.
