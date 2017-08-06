<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Wskm::t('Done', 'install');;
?>
<div class="container-fluid">
	
    <div style="margin:80px 0 0 30px;">
        <h2>
            <span class="glyphicon glyphicon-ok-sign text-success" style="font-size: 22px;"></span>
            <?= Wskm::t('Successful installation!', 'install') ?>
        </h2>
	</div>
    <div style="margin:50px 0 0 30px;">
        <a href="<?= Yii::$app->request->baseUrl ?>" class="btn btn-success"><?= Wskm::t('Frontend', 'install') ?></a>
        <p class="help-block"><?= Wskm::t('The backend is accessed according to the configuration of the web server.', 'install') ?></p>
        <p class="text-danger" style="word-wrap: break-word;"><b><?= Wskm::t('Please delete the file', 'install') ?></b> : <?= yii\helpers\FileHelper::normalizePath(Yii::getAlias('@app/controllers/InstallController.php')) ?></p>
    </div>
</div>
