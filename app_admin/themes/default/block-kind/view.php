<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BlockKind */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Block Kind'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-kind-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-default glyphicon glyphicon-pencil text-success']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-default glyphicon glyphicon-trash text-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
		'options' => ['class' => 'table table-hover detail-view'],
        'attributes' => [
            'id',
            'name',
            'key',
            'sorting',
        ],
    ]) ?>

</div>
