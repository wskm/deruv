<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
?>
<link rel="stylesheet" href="./themes/blog/css/user.css" type="text/css">
<div class="box" >
	<h2>
        <a  class="active" ><?= Wskm::t('Login') ?></a>&nbsp;&nbsp;&&nbsp;&nbsp;
        <a href="<?= Wskm::url(['/site/signup']) ?>" ><?= \Wskm::t('Signup') ?></a>
    </h2>
    
    <div class="postform" >
   
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput([
                'placeholder' => Wskm::t('Enter your user name', 'user'), 
                'autofocus' => true
                ])->label(false) ?>

            <?= $form->field($model, 'password')->passwordInput([
                'placeholder' => Wskm::t('Enter password', 'user'), 
                ])->label(false) ?>
            <div class="remember-item">
            <?php // $form->field($model, 'rememberMe')->checkbox() ?>
                
            <label><?= Html::checkbox('LoginForm[rememberMe]', $model->rememberMe) ?><?= \Wskm::t('Remember Me', 'user') ?></label>
                
            <?= Html::a(Wskm::t('Forget password', 'user'), ['site/request-password-reset'], [
                'style' => 'font-size:12px;',
            ]) ?>
            </div>

            <?= Html::submitButton(Wskm::t('Login'), ['class' => 'submit debtn-primary', 'name' => 'login-button']) ?>

        <?php ActiveForm::end(); ?>
       
    </div>
</div>
