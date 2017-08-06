<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use service\Block;
use common\widgets\Alert;
use yii\widgets\Breadcrumbs;

\frontend\assets\InstallAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php // echo Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | Deruv Install</title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="<?= STATIC_URL ?>fonts/css/Montserrat.css" type="text/css">
    <link rel="stylesheet" href="<?= STATIC_URL ?>fonts/css/Roboto.css" type="text/css">
    <link rel="stylesheet" href="<?= STATIC_URL ?>fonts/css/Roboto Mono.css" type="text/css">
	<link rel="stylesheet" href="./install/install.css" />		
</head>
<body>
<?php $this->beginBody() ?>
	<div id="wrapper">
        <div class="header text-center">
            <a href="http://www.deruv.com" target="_blank" >Deruv</a>
		</div>		
        <div class="main" id="site-main">
            <?= \common\widgets\Alert::widget() ?>

			<?= $content ?>
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
