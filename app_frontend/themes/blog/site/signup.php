<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = \Wskm::t('Signup');
?>
<link rel="stylesheet" href="<?= WEB_URL ?>themes/blog/css/user.css" type="text/css">
<div class="box" >
    <h2>
        <a href="<?= Wskm::url(['/site/login']) ?>" ><?= Wskm::t('Login') ?></a>&nbsp;&nbsp;&&nbsp;&nbsp;
        <a class="active"  ><?= \Wskm::t('Signup') ?></a>
    </h2>
    
    <div class="postform" >
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput([
                'placeholder' => Wskm::t('Enter your user name', 'user'), 
                'autofocus' => true
                ])->label(false) ?>

            <?= $form->field($model, 'email')->textInput([
                'placeholder' => Wskm::t('Enter your email', 'user'), 
                ])->label(false) ?>

            <?= $form->field($model, 'password')->passwordInput([
                'placeholder' => Wskm::t('Enter password', 'user'), 
                ])->label(false) ?>
            
            <?= $form->field($model, 'passwordConfirm')->passwordInput([
                'placeholder' => Wskm::t('Enter password confirm', 'user'), 
                ])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton(Wskm::t('Signup'), ['class' => 'submit', 'name' => 'signup-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
