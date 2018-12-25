<?php

/**
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 *        @link: https://github.com/terabytesoft/app-basic
 *      @author: Wilmer Arámbula <terabytesoftw@gmail.com>
 *   @copyright: (c) TERABYTE SOFTWARE SA
 *      @assets: [AppAsset]
 *       @since: 0.0.1
 *         @yii: 3.0
 **/


namespace app\basic\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/basic/assets/';
    
	public $css = [
		'css/site.css',
    ];
    
	public $js = [
    ];
    
	public $depends = [
		\yii\jquery\YiiAsset::class,
		\yii\bootstrap4\BootstrapAsset::class,
	];
}
