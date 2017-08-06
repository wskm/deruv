<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\JqueryAsset;

$this->title = Wskm::t('Configuration', 'install');
?>

<div class="container-fluid">
	
	<form class="form-horizontal" id="formWrap" method="post" action="<?= Url::to([ 'start' ]) ?>" >
		<?php // echo Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->getCsrfToken()) ?>
        
        <div id="firstWrap" >
            
		<h3><?= Wskm::t('Site Setting', 'install') ?></h3>
		<hr>
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('Site Name', 'install') ?></label>
		  <div class="col-sm-9">
			<input type="text" class="form-control" id="web-name" name="params[webName]" placeholder="">
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('Frontend Url', 'install') ?></label>
		  <div class="col-sm-9">
              <input type="text" class="form-control" id="web-url" name="params[webUrl]" value="<?= rtrim(Yii::$app->request->baseUrl, '/').'/' ?>" placeholder="">
              <p class="help-block"><?= Wskm::t('The backend will use this.', 'install') ?></p>
		  </div>
		</div>
        
        <div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('Backend Layout', 'install') ?></label>
		  <div class="col-sm-9">
              <label class="radio-inline">
                <input type="radio" name="params[adminLayout]" checked="true"  value="main"> Top
              </label>
              <label class="radio-inline">
                <input type="radio" name="params[adminLayout]" value="main_left"> Left
              </label>
		  </div>
		</div>
        
        <div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('Frontend Theme', 'install') ?></label>
		  <div class="col-sm-9">
              <label class="radio-inline">
                <input type="radio" name="params[frontendTheme]" value="default"> Cms
              </label>
              <label class="radio-inline">
                <input type="radio" name="params[frontendTheme]" checked="true" value="blog"> Blog
              </label>
		  </div>
		</div>
        
		<hr>
		<h3><?= Wskm::t('Administrator', 'install') ?></h3>
		<hr>
		<div class="form-group required ">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('User Name') ?></label>
		  <div class="col-sm-9">
			<input type="text" class="form-control" id="user_name" name="user[username]" placeholder="">
		  </div>
		</div>
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label">Email</label>
		  <div class="col-sm-9">
			<input type="text" class="form-control" id="email" name="user[email]"  placeholder="">
		  </div>
		</div>
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('New Password', 'user') ?></label>
		  <div class="col-sm-9">
			<input type="password" class="form-control" id="user-password" name="user[newPassword]" placeholder="">
		  </div>
		</div>
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('New Password Confirm', 'user') ?></label>
		  <div class="col-sm-9">
			<input type="password" class="form-control" id="user-password-confirm" name="user[newPasswordConfirm]" placeholder="">
		  </div>
		</div>
        <div class="form-group">
		  <div class="col-sm-offset-3 col-sm-9">
			  <button type="button" class="btn btn-info" onclick="nextStep()" ><?= Wskm::t('Next Step', 'install') ?></button>
		  </div>
		</div>
        
        </div>
		
		<div id="twoWrap" style="display:none" >
        <h3><?= Wskm::t('Database Configuration', 'install') ?></h3>
		<hr>
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('Host', 'install') ?></label>
		  <div class="col-sm-9">
			  <input type="text" class="form-control" id="host-name" name="db[host]" value="localhost" placeholder="">
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('Database Name', 'install') ?></label>
		  <div class="col-sm-9">
			<input type="text" class="form-control" id="db-name" value="deruv" name="db[dbname]" placeholder="">
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('User Name') ?></label>
		  <div class="col-sm-9">
			<input type="text" class="form-control" id="db-user-name" name="db[username]" placeholder="">
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('Password') ?></label>
		  <div class="col-sm-9">
			<input type="password" class="form-control" id="password" name="db[password]" placeholder="">
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label"><?= Wskm::t('Port', 'install') ?></label>
		  <div class="col-sm-9">
			<input type="text" class="form-control" id="port" value="3306" name="db[port]" placeholder="">
		  </div>
		</div>
        
		<div class="form-group">
		  <div class="col-sm-offset-3 col-sm-9">
              <button type="button" class="btn btn-info" onclick="lastStep();" ><?= Wskm::t('Last Step', 'install') ?></button>
              &nbsp;&nbsp;<button type="submit" class="btn btn-success"><?= Wskm::t('Install', 'install') ?></button>
		  </div>
		</div>
        
        </div>
	</form>
	
</div>
<script>

    function nextStep() {
        var webName = $('#web-name');
        if(!webName.val()){
            webName.focus();
            return;
        }
        
        var username = $('#user_name').val();
        if (username.length < 4) {
            alert('<?= Wskm::t('The user name length can not be less than 4', 'install') ?>');
            return;
        }
        
        var pw = $('#user-password').val();
        if (pw.length < 4) {
            alert('<?= Wskm::t('The password length can not be less than 4', 'install') ?>');
            return;
        }
        
        if (pw != $('#user-password-confirm').val()) {
            alert('<?= Wskm::t('Passwords do not match', 'user') ?>');
            return;
        }
        
        $('.alert').hide();
        $('#firstWrap').hide();
        $('#twoWrap').fadeIn();
    }
    
    function lastStep() {
        $('#twoWrap').hide();
        $('#firstWrap').fadeIn();
    }
    
	$('#formWrap').submit(function(e){
        var dbUserName = $('#db-user-name');
        if (!dbUserName.val()) {
            dbUserName.focus();
            return false;
        }
        
		return true;
	});
</script>
