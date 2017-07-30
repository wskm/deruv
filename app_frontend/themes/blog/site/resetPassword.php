<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = \Wskm::t('Reset password', 'user');
?>
<style>
    .form-group{
        margin-bottom: 15px !important;
    }
</style>
<div class="site-reset-password reset-wrap">
    <h2><?= Html::encode($this->title) ?></h2>
    <p><?= Wskm::t('Please enter your new password.', 'user') ?></p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
                    'id' => 'reset-password-form',
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

                <?= $form->field($model, 'password')->passwordInput([
                    'autofocus' => true,
                ]) ?>
            
                <?= $form->field($model, 'passwordConfirm')->passwordInput([
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Wskm::t('Submit'), ['class' => 'debtn debtn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
