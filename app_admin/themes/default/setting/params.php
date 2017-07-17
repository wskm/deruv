<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Setting';
$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript" >
	function addSetting(){
		$('#settingWrap').append('<div class="form-group">\
					<div class="col-sm-3"><input type="text" class="form-control" placeholder="Key" value="" ></div>\
					<div class="col-sm-4"><input type="text" class="form-control" placeholder="Value" value="" ></div>\
					<div class="col-sm-2"><select id="setting-test1-v" class="form-control" name=""><option value="0">text</option><option value="1" >radio</option><option value="1" >select</option></select></div> \
				</div>');
	}
</script>

<div class="col-sm-offset-2" >
	<?php $form = ActiveForm::begin([
			'id' => 'form',
			'layout' => 'horizontal',
			'action' => Url::to([ 'setting/update' ]),
		]); ?>
		
		<div id="settingWrap" >
			<?php foreach ($settings as $index => $setting) { ?>
				<?php 
				//$funHtml = 'label';
				$field = $form->field($setting, "[$index]v");
				
				if($index == 'debug'){ 
					echo $field->radioList(['no','yes'] ,['label'=> 'radio-inline' ] )->label($setting->k);
				}elseif($index == 'test'){ 
					echo $field->checkboxList(['no','yes'])->label($setting->k);
				}elseif($index == 'test1'){ 
					echo $field->dropDownList(['no','yes'])->label($setting->k);
				}else{
					echo $field->label($setting->k);
				}
				?>
				
			<?php } ?>
		
		</div>

		<div class="form-group">
		  <label  class="col-sm-3 control-label"></label>
		  <div class="col-sm-6">
			  <b class="glyphicon glyphicon-plus" onclick="addSetting()" ></b>
		  </div>
		</div>
		
		<div class="form-group">
		  <div class="col-sm-offset-3 col-sm-6">
			<button type="submit" class="btn btn-default">Submit</button>
		  </div>
		</div>
	<?php ActiveForm::end(); ?>

</div>

	