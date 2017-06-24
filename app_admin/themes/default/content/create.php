<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = Yii::t('app', 'Add');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Content'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">


    <?= $this->render('_form', [
        'model' => $model,
		'article' => $modelArticle,
    ]) ?>

</div>
