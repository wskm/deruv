<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CommentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
		'options'=>['class' => 'form-inline'],
	]); ?>
<?php //echo $form->field($model, 'created_at', [
	// 'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
	// ])->label(null, [ 'style' => 'line-height: normal']) ?>

<?= $form->field($model, 'user_name', [
	'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
])->label(null, [ 'style' => 'line-height: normal']) ?>

<?php echo $form->field($model, 'ip', [
	'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
])->label(null, [ 'style' => 'line-height: normal']) ?>

<?php echo $form->field($model, 'status', [
	'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
])->label(null, [ 'style' => 'line-height: normal'])->dropDownList(\common\models\Comment::getListStatus(), ['prompt' => \wskm::t('Please select')]) ?>

	<div class="form-group">
		<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-info btn-sm']) ?>
		<?= Html::submitButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-sm']) ?>
	</div>

	<?php ActiveForm::end(); ?>
		
</div>
