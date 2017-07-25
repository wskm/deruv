<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;

frontend\assets\JqueryAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <title><?= Html::encode($this->title) ?> | <?= \service\Setting::getParamConf('webName') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="description">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= Html::encode($this->title) ?>" >
  <meta property="og:url" content="<?= Yii::$app->request->absoluteUrl ?>" >
  <meta property="og:site_name" content="<?= \service\Setting::getParamConf('webName') ?>">
  <meta property="og:description">
  <?= Html::csrfMetaTags() ?>
  <link rel="icon" href="/favicon.png" type="image/x-icon">
  <?php $this->head() ?>
  <!--<link href='http://fonts.googleapis.com/css?family=Montserrat|Roboto:400,400italic,600|Roboto+Mono' rel='stylesheet' type='text/css'>-->
  <link rel="stylesheet" href="<?= STATIC_URL ?>fonts/css/Montserrat.css" type="text/css">
  <link rel="stylesheet" href="<?= STATIC_URL ?>fonts/css/Roboto.css" type="text/css">
  <link rel="stylesheet" href="<?= STATIC_URL ?>fonts/css/Roboto Mono.css" type="text/css">
  <link rel="stylesheet" href="./themes/blog/css/blog.css" type="text/css">
  <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
    <div id="wrapper">
        <div class="header clearfix">
			<div class="logoinfo"><a href="<?= Url::home(); ?>"><?= \service\Setting::getParamConf('webName') ?></a></div>
			<div class="headinfo">
                <span style="display:none" id="site-login" >
                    <a href="<?= Wskm::url(['/site/login']) ?>" ><?= \Wskm::t('Login') ?></a>&nbsp;&&nbsp;
                    <a href="<?= Wskm::url(['/site/signup']) ?>" ><?= \Wskm::t('Signup') ?></a>
                </span>
                <span id="site-user" style="display:none">
                    <a href="<?= Wskm::url(['/user']) ?>" id="user-name" ><?= Wskm::t('Profile') ?></a>&nbsp;
                    <a href="<?= Wskm::url(['/site/logout']) ?>"><?= \Wskm::t('Logout') ?></a>
                </span>
				<a href="/atom.xml" target="_blank"><img src="./themes/blog/img/feed.png"></a>
			</div>
		</div>		
        <div class="main" id="site-main">
            <?= \common\widgets\Alert::widget() ?>

			<?= $content ?>
        </div>
    </div>
    
    <div id="sidepanel" style="display:none" >
		<a href="javascript:;" class="css3top" ></a>
	</div>
	<script src="./themes/blog/js/site.js"></script>
	<script>
		$(function(){
			getUser('<?= Wskm::url(['site/userinfo']) ?>');
			
			stat('<?= Wskm::url(['/stat']) ?>');
		});
	</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
