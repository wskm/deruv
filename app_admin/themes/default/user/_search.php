<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
		'options'=>['class' => 'form-inline'],
	]); ?>

<?= $form->field($model, 'id', [
	'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
])->label(null, [ 'style' => 'line-height: normal']) ?>

<?= $form->field($model, 'username', [
	'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
])->label(null, [ 'style' => 'line-height: normal']) ?>
	
<?php  echo $form->field($model, 'status', [
	'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
])->dropDownList(\service\User::getListStatus(), ['prompt' => \wskm::t('Please select')])->label(\Wskm::t('Status'), [ 'style' => 'line-height: normal']) ?>
	
	<div class="form-group">
		<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-info btn-sm']) ?>
		<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-sm']) ?>
	</div>

	<?php ActiveForm::end(); ?>
		
</div>
