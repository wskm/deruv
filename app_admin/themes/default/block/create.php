<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Block */

$this->title = \Wskm::t('Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Block'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
