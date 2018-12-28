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