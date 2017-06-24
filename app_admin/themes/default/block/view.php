<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Block */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Block'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-default glyphicon glyphicon-pencil text-success']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-default glyphicon glyphicon-trash text-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
		'options' => ['class' => 'table table-hover detail-view'],
        'attributes' => [
            'id',
			'user_id',
			[     
				'label' => \Wskm::t('BlockKind', 'admin'),  
				'value' => \Wskm::t(\service\BlockKind::getInfo($model->kind_id)['name'], 'admin'),
			],
            'title',
            [     
				'captionOptions' => [ 'width' => '20%' ],
				'format' => 'raw',
				'attribute' => 'thumb',  
				'value' => $model->thumb ? "<img src='{$model->thumb}' width='300' />" : '',
			],
            'url:url',
            'summary',
            'sorting',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
