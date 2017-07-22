<?php

/* @var $this \yii\web\View */
/* @var $content string */

use admin\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
//use common\widgets\Alert;
use wskm\widgets\Alert;
use yii\helpers\Url;
use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;

AppAsset::register($this);

//, [ 'position' => \yii\web\View::POS_HEAD ]
$this->registerJsFile('themes/default/js/skin.conf.js');
$this->registerJsFile('themes/default/js/common.js');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="" />
	<meta name="keywords" content="" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - Deruv</title>
	<script>
        var runSkin = true;
		var staticUrl = '<?= \Wskm::getStaticUrl()?>';
        var siteNav = '<?= Wskm::viewVal('siteNav') ?>';		
    </script>
	
    <?php $this->head() ?>
    <link href="css/toastr.min.css" rel="stylesheet">
	<link href="themes/default/css/admin.css" rel="stylesheet">
	<style>
		.breadcrumb{
			margin-bottom: 15px;
		}
	</style>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="site-wrap" >
            <header class="container-fluid">
                <nav class="site-header " style="margin-top:5px;" >
				<?php
				
				$callback = function($menu){
					$data = [];  //eval($menu['data']);
					return [
						'label' => \Wskm::t($menu['name'], 'admin'), 
						'url' => [$menu['route']],
						'options' => [ 
							'id' => 'siteNav-'.$menu['name'],
						],
						'items' => $menu['children']
					];
				};

				$menuItems = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
		
				echo Nav::widget([
					'options' => ['class' => 'nav nav-tabs'],
					'items' => $menuItems,
				]);
				?>
                    
                    <?php if (!Yii::$app->user->isGuest) { ?>

					<ul class="nav navbar-nav" role="navigation" style="position: absolute;right: 0;top: 0;">
						<li role="presentation" class="dropdown" >
							<a href="javascript:;" id="headnotice-toggle"  class="dropdown-toggle" style="padding:0 15px;position: relative;line-height: 40px;color:black;background-color:#fff;" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-bell"></span>
                                <span class="badge" id="headnotice-count" style="position: absolute; right: 0;top: 0;padding: 2px;min-width: 16px;"></span>
                            </a>
							<ul class="dropdown-menu dropdown-menu-right headnotice-menu " id="notice-menu" >
							</ul>

						</li>
						<li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" style="padding:0 10px;line-height: 40px;color:black;background-color:#fff;" data-toggle="dropdown" role="button" aria-expanded="false">

                              <?=Yii::$app->user->identity->username ?>&nbsp;
							  <?php if(\Wskm::getUser()->avatar){ ?>
                              <img src="<?= \Wskm::getUser()->avatar ?>" class="img-circle " height="22" />
							  <?php }else{ ?>
							  <span class="glyphicon glyphicon-user "></span>
							  <?php } ?>

                            <b class="caret"></b>
                            </a>
                           <ul class="dropdown-menu" role="menu">
                              <li><a href="javascript:;" onclick="skinSwitch()" ><?= Wskm::t('Skinning', 'admin') ?></a></li>
                              <li><a href="<?= Url::to(['/user/profile']) ?>"><?= Wskm::t('Profile', 'user') ?></a></li>
							  <li class="divider"></li>
                              <li><a href="<?= Url::to(['/site/logout']) ?>"><?= Wskm::t('Logout') ?></a></li>
                            </ul>
                            
						</li>
						
					</ul>
                    <?php } ?>
                    
                </nav>

            </header>
            
            <div class="container-fluid  site-main" >
                <?php if ($this->context->id != 'site') { ?>

                <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <?php }  ?>

                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
                
            <footer>
			
			</footer>

			<div id="sidepanel" style="display:none" >
				<a href="javascript:;" class="glyphicon glyphicon-circle-arrow-up" ></a>
            </div>
			
			<div class="modal" id="skinModal" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><?= Wskm::t('Skinning', 'admin') ?></h4>
				  </div>
				  <div class="modal-body">
					 
						<ul class="SkinList clearfix" id="SkinBox">
							
                        </ul>

				  </div>
				</div>
			  </div>
			</div>

        </div>
            
        <script>
        
        if(siteNav == ''){
            siteNav = 'Home';
        }

        $('#siteNav-'+ siteNav).addClass('active');
        </script>
		
		<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
