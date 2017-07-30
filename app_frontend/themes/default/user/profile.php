<?php

//use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;

$this->title = \Wskm::t('Profile');

$model = \Wskm::getUser();
?>

<ul class="nav nav-tabs">
	<li role="presentation" class="active" ><a href="<?= Wskm::url(['user/index']) ?>"><?= \Wskm::t('Profile', 'user') ?></a></li>
	<li role="presentation"><a href="<?= Wskm::url(['user/contributes']) ?>"><?= \Wskm::t('Contributes', 'user') ?></a></li>
	<li role="presentation"><a href="<?= Wskm::url(['user/contribute']) ?>"><?= \Wskm::t('Contribute', 'user') ?></a></li>
</ul>

<div class="user-wrap">
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
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
            <?php if($model->avatar){ ?>
            <img src="<?= $model->avatar ?>" height="100" />
            <?php } ?>
        </div>
    </div>
    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'currentPassword')->passwordInput() ?>
    
	<?= $form->field($model, 'newPassword')->passwordInput()->hint(Wskm::t('If you do not change your password, please do not enter it.', 'user')) ?>
    <?= $form->field($model, 'newPasswordConfirm')->passwordInput() ?>
    
    <div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>