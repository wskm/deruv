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

$this->registerJsFile('themes/default/js/common.js');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= Html::encode($this->title) ?> - Deruv</title>
    <?= Html::csrfMetaTags() ?>
    <script>
        var runSkin = false;
		    var staticUrl = '<?= \Wskm::getStaticUrl()?>';
        var siteNav = '<?= Wskm::viewVal('siteNav') ?>';		
    </script>
    <?php $this->head() ?>
    <link href="themes/default/css/admin.css" rel="stylesheet">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= STATIC_URL ?>bower/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="<?= STATIC_URL ?>bower/ionicons/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="adminlte/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
    <link rel="stylesheet" href="<?= STATIC_URL ?>fonts/css/Source Sans Pro.css">
    <link href="css/toastr.min.css" rel="stylesheet">
</head>
<body class="hold-transition skin-gray sidebar-mini">
    <?php $this->beginBody() ?>

    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?= Url::home() ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>D</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Der</b>uv</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- Messages: style can be found in dropdown.less-->
              <!--
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <ul class="menu">

                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              -->

              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning" id="headnotice-count" ></span>
                </a>
                <ul class="dropdown-menu" style="min-width: 360px;" >
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu"  id="notice-menu" >
                     
                    </ul>
                  </li>
                  <li class="footer"><a href="<?= Url::to(['/log-action']) ?>"><?= Wskm::t('View all', 'admin') ?></a></li>
                </ul>
              </li>

              <!-- Tasks: style can be found in dropdown.less -->
              <!--
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php if(\Wskm::getUser()->avatar){ ?><?= \Wskm::getUser()->avatar ?><?php }else{ ?>img/avatar.png<?php } ?>" class="user-image" >
                  <span class="hidden-xs"><?=Yii::$app->user->identity->username ?></span>
                </a>
                <ul class="dropdown-menu">
                 <li><a href="<?= Url::to(['/user/profile']) ?>"><?= Wskm::t('Profile', 'user') ?></a></li>
                 <li><a href="<?= Url::to(['/site/logout']) ?>" ><?= Wskm::t('Logout') ?></a></li>
                 
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php if(\Wskm::getUser()->avatar){ ?><?= \Wskm::getUser()->avatar ?><?php }else{ ?>img/avatar.png<?php } ?>" class="img-circle" >
            </div>
            <div class="pull-left info">
              <p><?=Yii::$app->user->identity->username ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!--
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <?php
				
			$callback = function($menu){
				$data = [];
				$icon = $urlParam = '';
				if ($menu['data']) {
					$data = explode("\n", $menu['data']);
				}
				if ($data) {
                    $icon = $data[0];
					$urlParam = $data[1];
				}
				
				return [
					'label' => \Wskm::t($menu['name'], 'admin'), 
					'url' => Url::to([$menu['route']]).$urlParam,
                    'icon' => $icon,
					'options' => [ 
						'id' => 'siteNav-'.md5($menu['name']) ,
						'nav_route' => 'route'.str_replace('/', '_', $menu['route']) ,
					],
					'items' => $menu['children']
				];
			};

			$menuItems = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
			
			foreach($menuItems as $row){ 
				$htmlOption = '';
				foreach($row['options'] as $k => $v){
					$htmlOption .= "$k=\"$v\" ";
				}
                
				if($row['items']){ 
                    $icon = $row['icon'] ? $row['icon'] : 'fa fa-files-o';
                ?>
				<li class="treeview" <?= $htmlOption ?> >
				  <a href="<?= $row['url'] ?>">
					<i class="<?= $icon ?>"></i>
					<span><?= $row['label'] ?></span>
					<span class="pull-right-container">
					  <span class="label label-primary pull-right hidden">0</span>
					  <i class=" fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
						<?php 
						foreach($row['items'] as $v){  
							$htmlChildOption = '';
							foreach($v['options'] as $kk => $vv){
								$htmlChildOption .= "$kk=$vv ";
							}
						?>
                      <li <?= $htmlChildOption ?> ><a style="margin-left: 30px;" href="<?= $v['url'] ?>"><?= $v['label'] ?></a></li>
						<?php } ?>
				  </ul>
				</li>
			<?php
            }else{ 
                $icon = $row['icon'] ? $row['icon'] : 'fa fa-book';
            ?>
				<li <?= $htmlOption ?> ><a href="<?= $row['url'] ?>"><i class="<?= $icon ?>"></i> <span><?= $row['label'] ?></span></a></li>
			<?php }} ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header hidden">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        
          <!-- Main row -->
        <section class="content" style="background-color: #fff;" >
            <div class="row">
                <div style="padding:0 15px;" >
                <?php if ($this->context->id != 'site') { ?>

                <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <?php }  ?>
                
                <?= Alert::widget() ?>
                <?= $content ?>
                </div>
            </div>
        </section>
          <!-- /.row (main row) -->

        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <!--<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li> -->
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <!-- /.control-sidebar-menu -->

            demo
            <!-- /.control-sidebar-menu -->

          </div>
          <!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
          <!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">

          </div>
          <!-- /.tab-pane -->
        </div>
      </aside>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    
    <!-- Slimscroll -->
    <script src="adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FastClick -->
    <script src="adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="adminlte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="adminlte/dist/js/site.js"></script>

    <script>
	var navRoute = '<?= (Yii::$app->controller->module->id != 'app-admin' ? '_'.Yii::$app->controller->module->id :'') ?>_<?= Yii::$app->controller->id .'_'.Yii::$app->controller->action->id?>';
	var siteNav = '<?= md5(Wskm::viewVal('siteNav')) ?>';
	if(siteNav == ''){
		siteNav = '<?= md5('Home') ?>';
	}
		
	$('#siteNav-'+ siteNav).addClass('active menu-open');
	$('li[nav_route=route' + navRoute + ']').addClass('active menu-open');
	$('li[nav_route=route' + navRoute + ']').parents('li:first').addClass('active menu-open');
	</script>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
