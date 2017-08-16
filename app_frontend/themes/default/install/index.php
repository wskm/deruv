<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\JqueryAsset;

$this->title = 'Language';

JqueryAsset::register($this);

?>

<div class="container-fluid">
	
	<form class="form-horizontal" id="formWrap" method="post" action="<?= Url::to([ 'require' ]) ?>" >
		<?php // echo Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->getCsrfToken()) ?>
		<h2>Language</h2>
		<hr>
        <div class="form-group" >
		  <div class="col-sm-offset-1 col-sm-9">
                <small><samp><b>Version</b> <?= Wskm::$version ?></samp></small>
		  </div>
          <div class="col-sm-offset-1 col-sm-9">
              <small><samp><b>License</b> GPL-2.0</samp></small>
		  </div>
		</div>
		<div class="form-group" >
		  <div class="col-sm-offset-1 col-sm-9">
			<select class="form-control" name="language" >
				<option value="en-US">English</option>
                <option value="zh-CN">简体中文</option>
			</select>
		  </div>
		</div>
		
		<div class="form-group">
		  <div class="col-sm-offset-1 col-sm-9">
			<button type="submit" class="btn btn-info">Next Step</button>
		  </div>
		</div>
	</form>
	
</div>
<script>
	
</script>
