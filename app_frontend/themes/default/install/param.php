<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\JqueryAsset;

$this->title = 'Configuration';
?>

<div class="container-fluid">
	
	<form class="form-horizontal" id="formWrap" method="post" action="<?= Url::to([ 'start' ]) ?>" >
		<?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->getCsrfToken()) ?>
        
        <div id="firstWrap" >
            
		<h3><?= Wskm::t('Site Setting', 'install') ?></h3>
		<hr>
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label">Site Name</label>
		  <div class="col-sm-9">
			<input type="text" class="form-control" id="web-name" name="params[webName]" placeholder="">
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label">Site Url</label>
		  <div class="col-sm-9">
              <input type="text" class="form-control" id="web-url" name="params[webUrl]" value="<?= rtrim(Yii::$app->request->baseUrl, '/').'/' ?>" placeholder="">
              <p class="help-block">The backend will use this.</p>
		  </div>
		</div>
		<hr>
		<h3>Administrator</h3>
		<hr>
		<div class="form-group required ">
		  <label for="" class="col-sm-3 control-label">User Name</label>
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
		  <label for="" class="col-sm-3 control-label">Password</label>
		  <div class="col-sm-9">
			<input type="password" class="form-control" id="user-password" name="user[newPassword]" placeholder="">
		  </div>
		</div>
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label">Password Confirm</label>
		  <div class="col-sm-9">
			<input type="password" class="form-control" id="user-password-confirm" name="user[newPasswordConfirm]" placeholder="">
		  </div>
		</div>
        <div class="form-group">
		  <div class="col-sm-offset-3 col-sm-9">
			  <button type="button" class="btn btn-info" onclick="nextStep()" >Next Step</button>
		  </div>
		</div>
        
        </div>
		
		<div id="twoWrap" style="display:none" >
        <h3>Database Configuration</h3>
		<hr>
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label">Host</label>
		  <div class="col-sm-9">
			  <input type="text" class="form-control" id="host-name" name="db[host]" value="localhost" placeholder="">
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label">Database Name</label>
		  <div class="col-sm-9">
			<input type="text" class="form-control" id="db-name" value="deruv" name="db[dbname]" placeholder="">
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label">User Name</label>
		  <div class="col-sm-9">
			<input type="text" class="form-control" id="db-user-name" name="db[username]" placeholder="">
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label">Password</label>
		  <div class="col-sm-9">
			<input type="password" class="form-control" id="password" name="db[password]" placeholder="">
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="" class="col-sm-3 control-label">Port</label>
		  <div class="col-sm-9">
			<input type="text" class="form-control" id="port" value="3306" name="db[port]" placeholder="">
		  </div>
		</div>
        
		<div class="form-group">
		  <div class="col-sm-offset-3 col-sm-9">
              <button type="button" class="btn btn-info" onclick="lastStep();" >Last Step</button>
              &nbsp;&nbsp;<button type="submit" class="btn btn-success">Install</button>
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
