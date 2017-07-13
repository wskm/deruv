<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BlockKind */

$this->title = Yii::t('app', 'Update') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'BlockKind'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="block-kind-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
