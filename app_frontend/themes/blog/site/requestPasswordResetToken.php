<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = \Wskm::t('Request password reset', 'user');
?>
<style>
    .form-group{
        margin-bottom: 15px !important;
    }
</style>
<div class="site-request-password-reset reset-wrap" >
    <h3><?= Html::encode($this->title) ?></h3>

    <p><?= Wskm::t('Please fill out your email. A link to reset password will be sent there.', 'user') ?></p>

    <div class="row">
        <?php $form = ActiveForm::begin([
                'id' => 'request-password-reset-form',
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

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton(Wskm::t('Send', 'user'), ['class' => 'debtn debtn-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
