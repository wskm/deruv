<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comment'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">

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
            'content_id',
            'user_id',
            'user_name',
            [              
				'format' => 'raw',
				'attribute' => 'avatar',  
				'value' => $model->avatar ? "<img src='{$model->avatar}' width='100' />" : '',
			],
            'msg:ntext',
            'ip',
            [  
				'attribute' => 'status',
				'value' => \common\models\Comment::getListStatus()[$model->status],
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
