<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Block */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Block',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Block'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = \Wskm::t('Update');
?>
<div class="block-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
