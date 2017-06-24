<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => 'Content',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => \Wskm::t('Content', 'admin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] =  \Wskm::t('Update');
?>
<div class="content-update">

    <?= $this->render('_form', [
        'model' => $model,
		'article' => $modelArticle,
    ]) ?>

</div>
