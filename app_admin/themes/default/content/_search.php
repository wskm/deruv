<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ContentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
	'action' => ['index'],
	'method' => 'get',
	'options'=>['enctype'=>'multipart/form-data','class' => 'form-inline'],
]); 
?>

<?php echo $form->field($model, 'title', [
	'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
])->label(\Wskm::t('Title'), [ 'style' => 'line-height: normal']) ?>

<?= $form->field($model, 'user_name', [
	'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
])->label(\Wskm::t('User Name'), [ 'style' => 'line-height: normal']) ?>

<?= $form->field($model, 'category_id', [
	'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
])->dropDownList([])->label(\Wskm::t('Category', 'admin'), [ 'style' => 'line-height: normal']) ?>

<?php echo $form->field($model, 'status', [
	'template' => '<div class="input-group input-group-sm"><span class="input-group-addon">{label}</span>{input}</div>',
])->dropDownList(\wskm\Status::getPublishedOrUnpublished(), ['prompt' => \wskm::t('Please select')])->label(\Wskm::t('Status', 'admin'), [ 'style' => 'line-height: normal']) ?>

<div class="form-group">
	<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-info btn-sm']) ?>
</div>

<?php ActiveForm::end(); ?>
