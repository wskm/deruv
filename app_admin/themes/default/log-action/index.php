<?php

use yii\helpers\Html;
use wskm\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel admin\models\LogActionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Log Action');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-action-index">
	
<?php Pjax::begin(); ?>    <?= GridView::widget([
		'searchHtml' => $this->render('_search', ['model' => $searchModel]),
		'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'user_name',
            //'url:url',
            'title',
            // 'msg',
			[  
				'attribute' => 'type',  
				'headerOptions' => [  
					'width' => 60  
				]  
			], 
			[  
				'format' => 'raw',
				'attribute' => 'level',  
				'headerOptions' => [  
					'width' => 66  
				],
				'value'=> function($data){
					return  '<span class="'.($data->level > 0 ? 'text-danger' : 'text-success').'" >'.\service\Log::getListLevel()[$data->level].'</span>';
				} 
			], 
			[  
				'format' => 'datetime',
				'attribute' => 'created_at',  
				'headerOptions' => [  
					'width' => 170  
				]  
			], 

			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view}&nbsp;&nbsp;&nbsp;{delete}',
				'headerOptions' => ['width' => '10%'] 
			],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
