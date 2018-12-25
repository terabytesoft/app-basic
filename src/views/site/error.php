<?php

/**
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 *        @link: https://github.com/terabytesoft/app-basic
 *      @author: Wilmer Arámbula <terabytesoftw@gmail.com>
 *   @copyright: (c) TERABYTE SOFTWARE SA
 *       @views: site[error]
 *       @since: 0.0.1
 *         @yii: 3.0
 **/

use yii\helpers\Html;

$this->title = $name;

?>

<?= Html::beginTag('div', ['class' => 'site-error']) ?>

	<?= Html::tag('h1', Html::encode($this->title), ['class' => 'c-grey-900 mb-40']) ?>

	<?= Html::beginTag('div', ['class' => 'alert alert-danger']) ?>
		<?= nl2br(Html::encode($message)) ?>
	<?= Html::endTag('div') ?>

	<?= Html::beginTag('p') ?>
		<?= $this->app->t('basic', 'The above error occurred while the Web server was processing your request') ?>
	<?= Html::endTag('p') ?>

	<?= Html::beginTag('p') ?>
		<?= $this->app->t('basic', 'Please contact us if you think this is a server error. Thank you') ?>
	<?= Html::endTag('p') ?>

<?php echo Html::endTag('div');
