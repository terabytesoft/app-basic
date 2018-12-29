<p align="center">
    <a href="https://github.com/terabytesoft/app-basic" target="_blank">
        <img src="https://farm1.staticflickr.com/887/27875183957_69a3645a56_q.jpg" height="100px;">
    </a>
    <h1 align="center">Yii 3.0 Web Application Basic</h1>
</p>

</br>

<p align="center">
    <a href="https://www.yiiframework.com/" target="_blank">
        <img src="https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)" alt="Yii Framework">
    </a>
    <a href="https://scrutinizer-ci.com/g/terabytesoft/app-basic/build-status/master" target="_blank">
        <img src="https://scrutinizer-ci.com/g/terabytesoft/app-basic/badges/build.png?b=master" alt="Build Status">
    </a>
    <a href="https://scrutinizer-ci.com/g/terabytesoft/app-basic/?branch=master" target="_blank">
        <img src="https://scrutinizer-ci.com/g/terabytesoft/app-basic/badges/quality-score.png?b=master" alt="Code Quality">
    </a>
    <a href="https://scrutinizer-ci.com/code-intelligence" target="_blank">
        <img src="https://scrutinizer-ci.com/g/terabytesoft/app-basic/badges/code-intelligence.svg?b=master" alt="Code Intelligence Status">
    </a>
    <a href="https://codeclimate.com/github/terabytesoft/app-basic/maintainability" target="_blank">
        <img src="https://api.codeclimate.com/v1/badges/fe720f0219c23dc3e237/maintainability" alt="Maintainability">
    </a>
    <a href="https://packagist.org/packages/cjtterabytesoft/app" target="_blank">
        <img src="https://poser.pugx.org/terabytesoft/app-basic/downloads" alt="Total Downloads">
    </a>
</p>

</br>

<p align="justify">
App Web Application Basic of Yii Version 3.0 [Yii Framework](http://www.yiiframework.com/) application best for rapidly creating projects with Bootstrap 4.
</p>

</br>

![app-basic](docs/images/home.jpg)

</br>

DIRECTORY STRUCTURE:
--------------------

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

FEATURES:
---------

The App Web Application contains:

- [x] Pages - [Screenshots]:
    - [about](docs/images/about.jpg)
    - [contact](docs/images/contact.jpg)


- [x] User Functions - [Screenshots]:
    - [signup](docs/images/signup.png)
    - [login](docs/images/login.jpg)
    - [request password reset](docs/images/request-paswword-reset.jpg)
    - [reset password](docs/images/reset-password.jpg)
    - [logout](docs/images/logout.jpg)

<p align="justify">
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.
</P>

REQUIREMENTS:
-------------
 
The minimum requirement by this project template that your Web server supports PHP 7.1.

INSTALLATION:
-------------

<p align="justify">
If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).
</p>

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist --stability=dev terabytesoft/app-template-basic myapp
~~~

<p align="justify">
Now you should be able to access the application through the following URL, assuming `public` is the directory
directly under the Web root.

**App Web Application Basic (terabytesoft/app-basic) is installed automatically together with the Web Project Skeleton Application Basic (terabytesoft/app-template-basic), both try the necessary packages to start your Web Application Basic in Yii3.** 
</p>

~~~
http://localhost/
~~~

CONFIGURATION:
--------------

### APP-BASIC SETUP DEFAULT:

- [config/common.php](config/common.php)

- [config/console.php](config/console.php)

- [config/env.php](config/env.php)

- [config/messages.php](config/messages.php)

- [config/params.php](config/params.php)

- [config/web.php](config/web.php)

### WEB SERVER SUPPORT:

- Apache.
- Nginx.
- OpenLiteSpeed.

### DOCUMENTATION STYLE GUIDE:

- [Style Guide](docs/DOCUMENTATION.md)

LICENSE:
--------

[![License](https://poser.pugx.org/terabytesoft/app-basic/license)](https://packagist.org/packages/cjtterabytesoft/app)

