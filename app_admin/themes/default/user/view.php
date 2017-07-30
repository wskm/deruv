<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'User'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
			[              
				'format' => 'raw',
				'attribute' => 'avatar',  
				//'label' => \Wskm::t('Thumb'),
				'value' => $model->avatar ? "<img src='{$model->avatar}' width='100' />" : '',
			],
            'id',
            'username',
            'email:email',
			[              
				'attribute' => 'status',  
				//'label' => \Wskm::t('Thumb'),
				'value' => \common\models\User::getStatusName($model->status),
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
