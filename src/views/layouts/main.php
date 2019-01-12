<?php

/**
 * main is the layout Web Application Basic.
 **/

use app\basic\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\helpers\Yii;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>

	<!DOCTYPE html>
	<?= Html::beginTag('html', ['lang' => $this->getApp()->language]) ?>

		<?= Html::beginTag('head') ?>
			<?= Html::tag('meta', '', ['charset' => $this->getApp()->encoding]) ?>
			<?= Html::tag('meta', '', ['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge']) ?>
			<?= Html::tag('meta', '', ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']) ?>
			<?= Html::csrfMetaTags() ?>
			<?= Html::tag('title', Html::encode($this->title)) ?>
			<?php $this->head() ?>
		<?= Html::endTag('head') ?>
		
		<?php $this->beginBody() ?>
		
			<?= Html::beginTag('body') ?>

				<?= Html::beginTag('wrapper', ['class' => 'd-flex flex-column']) ?>

					<?php NavBar::begin([
						'brandLabel' => $this->getApp()->t('basic', $this->getApp()->name),
						'brandUrl' => $this->getApp()->homeUrl,
						'options' => [
						    'class' => 'navbar  navbar-dark bg-dark navbar-expand-lg',
						],
					]);

					echo Nav::widget([
						'options' => ['class' => 'navbar-nav float-right ml-auto'],
						'items' => [
							['label' => $this->getApp()->t('basic', 'Home'), 'url' => ['/site/index']],
							['label' => $this->getApp()->t('basic', 'About'), 'url' => ['/site/about']],
							['label' => $this->getApp()->t('basic', 'Contact'), 'url' => ['/site/contact']],
						],
					]);

					NavBar::end(); ?>
					
					<?= Html::beginTag('div', ['class' => 'container flex-fill']) ?>

						<?= Breadcrumbs::widget([
							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						]) ?>
                        <?= Alert::widget() ?>
						<?= $content ?>

					<?= Html::endTag('div') ?>	
	
					<?= Html::beginTag('footer', ['class' => 'footer']) ?>

						<?= Html::beginTag('div', ['class' => 'container flex-fill']) ?>

							<?= Html::beginTag('p', ['class' => 'float-left']) ?>
								<?= '&copy; ' . $this->getApp()->t('basic', 'My Company') . ' ' . date('Y') ?>
							<?= Html::endTag('p') ?>

							<?= Html::beginTag('p', ['class' => 'float-right']) ?>
								<?= $this->getApp()->t('basic', 'Powered by') ?>
								<?= Html::a(
									$this->getApp()->t(
										'basic',
										'Yii Framework'
									),
									'http://www.yiiframework.com/',
									['rel' => 'external']
								) ?>							
							<?= Html::endTag('p') ?>

						<?= Html::endTag('div') ?>

					<?= Html::endTag('footer') ?>
					
				<?= Html::endTag('wrapper') ?>	    
			
			<?= Html::endTag('body') ?>

		<?php $this->endBody() ?>

	<?= Html::endTag('html') ?>

<?php $this->endPage() ?>
