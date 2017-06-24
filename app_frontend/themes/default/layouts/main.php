<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use service\Block;
use common\widgets\Alert;

yii\bootstrap\BootstrapAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | <?= \service\Setting::getParamConf('webName') ?></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
    <?php $this->head() ?>
	<link rel="stylesheet" href="./css/home.css" />		
</head>
<body>
<?php $this->beginBody() ?>

	<div class="head" >
		<div class="container-fluid dnav" >
			<!--
			<div class="col-xs-1" style="z-index: 99;" >
				<div class="logo "  >
					<h1>
						<a href="" class="bg" >web</a>
					</h1>
				</div>
			</div>
			-->
			<nav class="navbar navbar-inverse " role="navigation" style="background-color: #0c0c0c;border: none;" >
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <h1><a class="navbar-brand" href="<?= Url::home(); ?>" style="padding:0;color:transparent;" ><img alt="Brand" src="./img/logo.png" height="60" >web name</a></h1>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					<li class="active"><a href="<?= Url::home(); ?>"><?= \Wskm::t('Home') ?> <span class="sr-only">(current)</span></a></li>
					<?php $navs = Block::shows('nav'); ?>
					<?php foreach($navs as $v){ ?>
					<li ><a href="<?= $v['url'] ?>"><?= $v['title'] ?></a></li>
					<?php } ?>
				  </ul>
				  <form class="navbar-form navbar-right" role="search" action="" method="get" >
					<div class="form-group">
					  <input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default" style="border: none;background: transparent;color: #fff;" >
					  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</button>
				  </form>

				</div><!-- /.navbar-collapse -->
			</nav>

		</div>
	</div>
	<div class="container-fluid main" >
		<?= Alert::widget() ?>
        <?= $content ?>
	</div>
	<div class="container-fluid foot" >
		<div class="foot-main" >
			&copy; <?= \service\Setting::getParamConf('webName').'&nbsp;'.date('Y') ?>&nbsp;&nbsp;|&nbsp;&nbsp;网站地图
		</div>
	</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
