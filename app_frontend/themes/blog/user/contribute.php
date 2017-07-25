<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;

\yii\bootstrap\BootstrapPluginAsset::register($this);

$this->title = \Wskm::t('Profile');

?>
<div class="bs-wrap user-font">
    <ul class="nav nav-tabs">
        <li role="presentation" ><a href="<?= Wskm::url(['user/index']) ?>"><?= \Wskm::t('Profile', 'user') ?></a></li>
        <li role="presentation"><a href="<?= Wskm::url(['user/contributes']) ?>"><?= \Wskm::t('Contributes', 'user') ?></a></li>
        <li role="presentation" class="active" ><a href="<?= Wskm::url(['user/contribute']) ?>"><?= \Wskm::t('Contribute', 'user') ?></a></li>
    </ul>
    <div class="user-wrap" >
    <?php $form = ActiveForm::begin([
		'id' => 'form-content',
		'layout' => 'default',
		'fieldConfig' => [
			'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
			'horizontalCssClasses' => [
				'label' => 'col-sm-1',
				'offset' => '',
				'wrapper' => 'col-sm-11',
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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? \Wskm::t('Add') : \Wskm::t('Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>
	<?= \wskm\web\Bower::getEditor('article-detail', [
		'formId' => '#form-content',
	]) ?>
	
    </div>
</div>