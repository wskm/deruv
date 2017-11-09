<?php

use yii\helpers\Html;

\yii\bootstrap\BootstrapPluginAsset::register($this);

$this->title = Wskm::t('Profile', 'user');

?>
<div class="bs-wrap user-font">

    <div class="user-wrap">                
  
        <h3><?= $model->username ?></h3>
        <table class="table ">
            <?php if($model->avatar){ ?>
            <tr>
                <td><?= Wskm::t('Avatar') ?></td>
                <td><img src="<?= $model->avatar ?>" height="100" /></td>
            </tr>
            <?php } ?>
            <tr>
                <td width="30%" ><?= Wskm::t('Signup At', 'user') ?></td>
                <td><?= Yii::$app->formatter->asDatetime($model->created_at) ?></td>
            </tr>
        
        </table>

    </div>
</div>