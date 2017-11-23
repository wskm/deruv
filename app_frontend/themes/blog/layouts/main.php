<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;
use service\Block;

frontend\assets\JqueryAsset::register($this);
yii\bootstrap\BootstrapPluginAsset::register($this);

if (!isset($this->metaTags['keywords'])) {
    $this->registerMetaTag([
        'name' => 'keywords',
        'content' => \service\Setting::getParamConf('webKeywords')
    ]);
}
if (!isset($this->metaTags['description'])) {
    $this->registerMetaTag([
        'name' => 'description',
        'content' => \service\Setting::getParamConf('webDescription')
    ]);
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <title><?= Html::encode($this->title) ?> | <?= \service\Setting::getParamConf('webName') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta property="og:type" content="<?= Yii::$app->controller->id ?>">
  <meta property="og:title" content="<?= Html::encode($this->title) ?>" >
  <meta property="og:url" content="<?= Yii::$app->request->absoluteUrl ?>" >
  <meta property="og:site_name" content="<?= \service\Setting::getParamConf('webName') ?>">
  <link rel="shortcut icon" href="<?= WEB_URL ?>favicon.ico" type="image/x-icon" />
  <?= Html::csrfMetaTags() ?>
  <?php $this->head() ?>
  <!--<link href='http://fonts.googleapis.com/css?family=Montserrat|Roboto:400,400italic,600|Roboto+Mono' rel='stylesheet' type='text/css'>-->
  <link rel="stylesheet" href="<?= STATIC_URL ?>fonts/css/Montserrat.css" type="text/css">
  <link rel="stylesheet" href="<?= STATIC_URL ?>fonts/css/Roboto.css" type="text/css">
  <link rel="stylesheet" href="<?= STATIC_URL ?>fonts/css/Roboto Mono.css" type="text/css">
  <link rel="stylesheet" href="<?= WEB_URL ?>themes/blog/css/blog.css" type="text/css">
  <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
    
    <nav class=" navbar navbar-default navbar-fixed-top" style="background-color:#fff;" >
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-nav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?= Url::home(); ?>"><?= \service\Setting::getParamConf('webName') ?></a>

            </div>
            <div class="navwrap">
                <div class=" collapse navbar-collapse" id="site-nav">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="<?= Url::home(); ?>"><?= \Wskm::t('Home') ?> <span class="sr-only">(current)</span></a></li>

                    <?php $navs = Block::shows('nav'); ?>
                    <?php foreach($navs as $v){ ?>
                      <li ><a href="<?= $v['url'] ?>"><?= $v['title'] ?></a></li>
                    <?php } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="headinfo">
                            <span style="display:none" id="site-login" >
                                <a href="<?= Wskm::url(['/site/login']) ?>" ><?= \Wskm::t('Login') ?></a>&nbsp;&&nbsp;
                                <a href="<?= Wskm::url(['/site/signup']) ?>" ><?= \Wskm::t('Signup') ?></a>
                            </span>
                            <span id="site-user" style="display:none">
                                <a href="<?= Wskm::url(['/user']) ?>" id="user-name" ><?= Wskm::t('Profile') ?></a>&nbsp;
                                <a href="<?= Wskm::url(['/site/logout']) ?>"><?= \Wskm::t('Logout') ?></a>
                            </span>
                            <a href="<?= Wskm::url(['feed/atom']) ?>"  target="_blank"><img src="<?= WEB_URL ?>themes/blog/img/feed.png"></a>
                        </li>
                    </ul>
                </div>


            </div>

        </div>
    </nav>
    
    <div id="wrapper" class="container ">
        <div class="main" id="site-main">
            <?= \common\widgets\Alert::widget() ?>

			<?= $content ?>
        </div>
    </div>
    
    <div id="sidepanel" style="display:none" >
		<a href="javascript:;" class="css3top" ></a>
	</div>
	<script src="<?= WEB_URL ?>themes/blog/js/site.js"></script>
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
