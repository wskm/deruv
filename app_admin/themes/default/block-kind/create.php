<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BlockKind */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Block Kind'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-kind-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
