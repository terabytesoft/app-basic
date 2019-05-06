<?php

/**
 * main.
 *
 * Layout web application basic
 **/
use Terabytesoft\App\Basic\Assets\AppAsset;
use Terabytesoft\Widgets\Alert;
use Yiisoft\Yii\Bootstrap4\Html;
use Yiisoft\Yii\Bootstrap4\Nav;
use Yiisoft\Yii\Bootstrap4\NavBar;
use Yiisoft\Yii\Bootstrap4\Breadcrumbs;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>

	<!DOCTYPE html>
	<?= Html::beginTag('html', ['lang' => $this->app->language]) ?>

		<?= Html::beginTag('head') ?>
			<?= Html::tag('meta', '', ['charset' => $this->app->encoding]) ?>
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
                        'brandLabel' => $this->app->t('basic', $this->app->name),
                        'brandUrl'   => $this->app->homeUrl,
                        'options'    => [
                            'class' => 'navbar  navbar-dark bg-dark navbar-expand-lg',
                        ],
                    ]);

                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav float-right ml-auto'],
                        'items'   => [
                            ['label' => $this->app->t('basic', 'Home'), 'url' => ['/site/index']],
                            ['label' => $this->app->t('basic', 'About'), 'url' => ['/site/about']],
                            ['label' => $this->app->t('basic', 'Contact'), 'url' => ['/site/contact']],
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
								<?= '&copy; '.$this->app->t('basic', 'My Company').' '.date('Y') ?>
							<?= Html::endTag('p') ?>

							<?= Html::beginTag('p', ['class' => 'float-right']) ?>
								<?= $this->app->t('basic', 'Powered by') ?>
								<?= Html::a(
                                    $this->app->t(
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
