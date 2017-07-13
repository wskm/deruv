<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' =>  \Wskm::t('Content', 'admin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-view">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-default glyphicon glyphicon-pencil text-success']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-default glyphicon glyphicon-trash text-danger',
            'data' => [
                'confirm' => Yii::t('common', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
		'options' => ['class' => 'table table-hover detail-view'],
		/*
		'formatter' => [
            'class' => '\yii\i18n\Formatter',
            'dateFormat' => 'Y-M-d',
            'datetimeFormat' => 'Y-M-d H:i:s',
            'timeFormat' => 'H:i:s', 
		],*/
        'attributes' => [
            'id',
            [  
				'captionOptions' => [ 'width' => '20%' ],
				'label' => \Wskm::t('Category', 'admin'),  
				'attribute' => 'category_id',  
				'value'=> \service\Category::getInfoName($model->category_id),
			],
            'user_id',
            'user_name',
			[              
				'format' => 'raw',
				'attribute' => 'thumb',
				'value' => $model->thumb ? "<img src='{$model->thumb}' width='300' />" : '',
			],
            'title',
            'summary',
			[  
				'format' => 'raw',
				'label' => Yii::t('admin', 'Content'),
				'value' => $model->article->detail,
			],
            'pv',
            'comment',
			[  
				'attribute' => 'iscomment',
				'value' => \wskm\Status::getNoOrYes()[$model->iscomment],
			],
            [  
				'attribute' => 'status',
				'value' => \common\models\Content::getStatusName($model->status),
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
