<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Database';
?>
<div class="container-fluid">
	
    <div style="margin:80px 0 0 30px;">
        <h2>
            <span class="glyphicon glyphicon-ok-sign text-success" style="font-size: 22px;"></span>
            <?= Wskm::t('Successful installation!', 'install') ?>
        </h2>
	</div>
    <div style="margin:60px 0 0;text-align: center;">
        <a href="<?= Yii::$app->request->baseUrl ?>" class="btn btn-success"><?= Wskm::t('Frontend', 'install') ?></a>
        <p class="help-block"><?= Wskm::t('The backend needs to be set by itself.', 'install') ?></p>
    </div>
</div>
