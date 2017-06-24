<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;

$temp = new stdClass();
$temp->thumb = $model->avatar;
		
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $this->render('/common/_upload',[
	'model' => $temp,
	'plan' => 1,
]) ?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
		'layout' => 'horizontal',
		'fieldConfig' => [
			'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
			'horizontalCssClasses' => [
				'label' => 'col-sm-2',
				'offset' => 'col-sm-offset-2',
				'wrapper' => 'col-sm-9',
				'error' => '',
				'hint' => '',
			],
		],
	]); ?>
	<div class="form-group field-block-thumb required">
		<label class="control-label col-sm-2" ><?= \Wskm::t('Avatar')?></label>
		<div class="col-sm-9">
			<div class="kv-avatar" style="width:200px">
				<?php echo Html::hiddenInput('User[avatar]', $model->avatar, ['id' => 'block-thumb'])	?>
				<input id="blockUpload" name="Uploads[file]" type="file" class="file-loading" >
			</div>
		</div>
	</div>
	<?php if($model->id != \Wskm::getUser()->id) { ?>
	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
	<?php } ?>
	
	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	
	<?php if($model->id != 1 && $model->id != \Wskm::getUser()->id) { ?>
    <?= $form->field($model, 'status')->dropDownList(\service\User::getListStatus()) ?>
	<?php } ?>
	
	<?= $form->field($model, 'newPassword')->passwordInput() ?>
    <?= $form->field($model, 'newPasswordConfirm')->passwordInput() ?>
	
    <div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
