<?php

/**
 * index is the view Web Application Basic.
 **/

use yii\helpers\Html;

$this->title = $this->getApp()->t('basic', 'Index');

?>

<?= Html::beginTag('div', ['class' => 'site-index']) ?>

	<?= Html::beginTag('div', ['class' => 'jumbotron']) ?>
		
		<?= Html::tag('h1', $this->getApp()->t('basic', 'Congratulations'), ['class' => 'c-grey-900 mb-40']) ?>

		<?= Html::beginTag('p', ['class' => 'lead']) ?>
			<?= $this->getApp()->t('basic', 'You have successfully created your Yii-powered application') ?>
		<?= Html::endTag('p') ?>

		<?= Html::beginTag('p') ?>
			<?= Html::beginTag('a', ['class' => 'btn btn-lg btn-success', 'href' => 'http://www.yiiframework.com']) ?>
				<?= $this->getApp()->t('basic', 'Get started with Yii') ?>
			<?= Html::endTag('a') ?>
		<?= Html::endTag('p') ?>

	<?= Html::endTag('div') ?>

	<?= Html::beginTag('div', ['class' => 'body-content']) ?>

		<?= Html::beginTag('div', ['class' => 'row']) ?>
			
			<?= Html::beginTag('div', ['class' => 'col-lg-4']) ?>
				
				<?= Html::tag('h2', 'Heading') ?>

				<?= Html::beginTag('p') ?>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
					dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
					ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
					fugiat nulla pariatur.
				<?= Html::endTag('p') ?>

				<?= Html::beginTag('p') ?>
					<?= Html::beginTag('a', ['class' => 'btn btn-default', 'href' => 'http://www.yiiframework.com/doc/']) ?>
						<?= $this->getApp()->t('basic', 'Yii Documentation') . ' &raquo;' ?>
					<?= Html::endTag('a') ?>
				<?= Html::endTag('p') ?>
			
			<?= Html::endTag('div') ?>

			<?= Html::beginTag('div', ['class' => 'col-lg-4']) ?>

				<?= Html::tag('h2', 'Heading') ?>

				<?= Html::beginTag('p') ?>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
					dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
					ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
					fugiat nulla pariatur.
				<?= Html::endTag('p') ?>

				<?= Html::beginTag('p') ?>
					<?= Html::beginTag('a', ['class' => 'btn btn-default', 'href' => 'http://www.yiiframework.com/forum/']) ?>
						<?= $this->getApp()->t('basic', 'Yii Forum') . ' &raquo;' ?>
					<?= Html::endTag('a') ?>
				<?= Html::endTag('p') ?>

			<?= Html::endTag('div') ?>

			<?= Html::beginTag('div', ['class' => 'col-lg-4']) ?>
				
				<?= Html::tag('h2', 'Heading') ?>

				<?= Html::beginTag('p') ?>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
					dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
					ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
					fugiat nulla pariatur.
				<?= Html::endTag('p') ?>

				<?= Html::beginTag('p') ?>
					<?= Html::beginTag('a', ['class' => 'btn btn-default', 'href' => 'http://www.yiiframework.com/extensions/']) ?>
						<?= $this->getApp()->t('basic', 'Yii Extensions') . ' &raquo;' ?>
					<?= Html::endTag('a') ?>
				<?= Html::endTag('p') ?>

			<?= Html::endTag('div') ?>

		<?= Html::endTag('div') ?>

	<?= Html::endTag('div') ?>

<?= Html::endTag('div') ?>
