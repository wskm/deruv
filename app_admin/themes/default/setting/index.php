<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Wskm::t('Setting');
$this->params['breadcrumbs'][] = $this->title;
?>

<ul class="nav nav-tabs">
	<li role="presentation"  id="type-param" ><a href="<?= Url::to(['/setting', 'type' => 'param']) ?>">Param</a></li>
	<li role="presentation"  id="type-sys" ><a href="<?= Url::to(['/setting', 'type' => 'sys']) ?>">System</a></li>
	<li role="presentation"  id="type-email" ><a href="<?= Url::to(['/setting', 'type' => 'email']) ?>">Email</a></li>
	<li role="presentation"  id="type-content" ><a href="<?= Url::to(['/setting', 'type' => 'content']) ?>">Content</a></li>
	<li role="presentation"  id="type-image" ><a href="<?= Url::to(['/setting', 'type' => 'image']) ?>">Image</a></li>
	<li role="presentation"  id="type-cache" ><a href="<?= Url::to(['/setting', 'type' => 'cache']) ?>">Cache</a></li>
</ul>
<script>
	var tabType = '<?= $type ?>';
	if (tabType == '') {
		tabType = 'sys';
	}

	$('#type-' + tabType).addClass('active');
</script>
<div class="col-sm-offset-1" style="margin-top:30px;" >

	<?php
	$form = ActiveForm::begin([
				'id' => 'form',
				'layout' => 'horizontal',
				'action' => Url::to(['setting/update']),
	]);
	?>
	<?= Html::hiddenInput('type', $type) ?>
	<div id="settingWrap" >
		<?php foreach ($settings as $index => $setting) { ?>
			<?php
			//$funHtml = 'label';
			$field = $form->field($setting, "[$index]v");
			$field->inline = true;

			$noyes = [Wskm::t('No'), Wskm::t('Yes')];

			$out = $setting->out;
			$name = Wskm::t(ucfirst($setting->k), 'admin');

			$langs = [
				'zh-CN' => 'zh-CN',
				'en-US' => 'en-US',
			];
			
			$toList = [];
			if ($index == 'language') {
				$toList = $langs;
			}else if($index == 'timeZone'){
				$toList = \wskm\Timezone::getList();
			}
			
			if ($out == 'radio') {
				echo $field->radioList($toList)->label($name);
			} elseif ($out == 'radio_noyes') {
				echo $field->radioList($noyes)->label($name);
			} elseif ($out == 'checkbox') {
				echo $field->checkboxList($noyes)->label($name);
			} elseif ($out == 'select') {
				echo $field->dropDownList($toList)->label($name);
			} elseif ($out == 'select_noyes') {
				echo $field->dropDownList($noyes)->label($name);
			} else {
				echo $field->label($name);
			}
			?>

		<?php } ?>

	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-6">
			<button type="submit" class="btn btn-default">提交</button>
		</div>
	</div>
	<?php ActiveForm::end(); ?>

</div>


