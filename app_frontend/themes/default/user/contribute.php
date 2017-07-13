<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;

$this->title = \Wskm::t('Profile');

?>
<ul class="nav nav-tabs">
	<li role="presentation" ><a href="<?= Wskm::url(['user/index']) ?>"><?= \Wskm::t('Profile', 'user') ?></a></li>
	<li role="presentation"><a href="<?= Wskm::url(['user/contributes']) ?>"><?= \Wskm::t('Contributes', 'user') ?></a></li>
	<li role="presentation" class="active" ><a href="<?= Wskm::url(['user/contribute']) ?>"><?= \Wskm::t('Contribute', 'user') ?></a></li>
</ul>
<div class="user-wrap" >
<?php $form = ActiveForm::begin([
		'id' => 'form-content',
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

	<?= $form->field($model, 'category_id')->dropDownList(\service\Category::getListOptions(false, $model->category_id), [
		'encode'=>false,
		//'style' => 'width:280px',
		])->label(\Wskm::t('Category', 'admin'))?>	
		
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($article, 'detail')->textarea([
		'rows' => 20,
	]) ?>

	<?= $form->field($model, 'iscomment')->inline(true)->radioList(\wskm\Status::getNoOrYes()) ?>

    <div class="form-group field-content-thumbup required">
		<div class="col-sm-offset-2 col-sm-2">
        <?= Html::submitButton($model->isNewRecord ? \Wskm::t('Add') : \Wskm::t('Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
	</div>
	
	<?php ActiveForm::end(); ?>
	<?= \wskm\web\Bower::getEditor('article-detail', [
		'formId' => '#form-content',
	]) ?>
	
</div>