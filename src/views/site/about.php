<?php

/**
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 *        @link: https://github.com/terabytesoft/app-basic
 *      @author: Wilmer Arámbula <terabytesoftw@gmail.com>
 *   @copyright: (c) TERABYTE SOFTWARE SA
 *       @views: site[about]
 *       @since: 0.0.1
 *         @yii: 3.0
 **/

use yii\helpers\Html;

$this->title = $this->app->t('basic', 'About');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::beginTag('div', ['class' => 'site-about"']) ?>

	<?= Html::tag('h1', '<b>' . Html::encode($this->title) . '</b>', ['class' => 'c-grey-900 mb-40']) ?>
	<?= Html::tag('p', $this->app->t('basic', 'This is the About page. You may modify the following file to customize ' .
		'its content.')) ?>

	<code><?= __FILE__ ?></code>

<?= Html::endTag('div') ?>