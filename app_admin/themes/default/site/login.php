<?php

/* @var $this \yii\web\View */
/* @var $content string */

use admin\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

AppAsset::register($this);
$this->registerJsFile('themes/default/js/skin.conf.js');
$this->registerJsFile('themes/default/js/common.js');

$this->title = \Wskm::t('Login');
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
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | Deruv</title>
    <script>
        var runSkin = true;
		var staticUrl = '<?= \Wskm::getStaticUrl()?>';
        var siteNav = '<?= Wskm::viewVal('siteNav') ?>';		
    </script>
    <?php $this->head() ?>
	<link href="themes/default/css/admin.css" rel="stylesheet">
	<style>
		.form-group {
			margin-bottom: 5px;
		}
	</style>
</head>
<body>
<?php $this->beginBody() ?>

		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel"><?=$this->title?></h4>
                </div>
                <div class="modal-body">

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?php if (Wskm::session('login.fail') > 3) { ?>
					<?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <?= Alert::widget() ?>
                  <button type="submit" data-loading-text="Load..."  class="btn btn-info" id="login-button" name="login-button"  ><?=$this->title?></button>
                </div>
                <?php ActiveForm::end(); ?>
			</div>
		  </div>
		</div>        
		
		<script>
			$('#loginModal').modal({
				keyboard: false			  
			})
			$('#loginModal').on('hidden.bs.modal', function (e) {
				$('#loginModal').modal("show");
			})
			$('#loginModal').modal("show");

			//loginPost();
		</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
