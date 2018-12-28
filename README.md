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


App Web Application Template is a skeleton of Yii Version 3.0 [Yii Framework](http://www.yiiframework.com/) application best for rapidly creating projects.

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
composer create-project --prefer-dist --stability=dev cjtterabytesoft/app myapp
~~~

Now you should be able to access the application through the following URL, assuming `public` is the directory
directly under the Web root.

~~~
http://localhost/
~~~

CONFIGURATION
-------------

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
