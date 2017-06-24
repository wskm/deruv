<?php

use yii\helpers\Html;
use wskm\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'User');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-default glyphicon glyphicon-plus-sign text-success']) ?>
    </p>
	
<?php Pjax::begin(); ?>    <?= GridView::widget([
			'searchHtml' => $this->render('_search', ['model' => $searchModel]),
		    'dataProvider' => $dataProvider,
			/*
			'rowOptions' => function ($model, $index, $widget, $grid){
				return ['style'=> 'vertical-align: middle;'];
			 },
			 */
			
			'columns' => [
			[  
				'attribute' => 'id',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
				'headerOptions' => [  
					'width' => '6%'  
				],				
			], 
			[  
				'format' => 'raw',
				'attribute' => 'avatar',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
				'headerOptions' => [  
					'width' => '60px',
					'style' => 'text-align: center;',
				],
				'value'=> function($data){
					return ($data->avatar ? "<img src='{$data->avatar}' class='img-circle' height='40' />" : '<span class=" glyphicon glyphicon-user avatar-default"  ></span>');
				} 
			], 
			[  
				'format' => 'raw',
				'attribute' => 'username',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
			], 
			[  
				'attribute' => 'email',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
			],
			[  
				'attribute' => 'status',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
				'headerOptions' => [  
					'width' => 60  
				],
				'value'=> function($data){
					return \service\User::getListStatus()[$data->status];
				} 
			], 
			[  
				'format' => 'datetime',
				'attribute' => 'created_at',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
				'headerOptions' => [  
					'width' => 160  
				]  
			], 
            [
				'class' => 'yii\grid\ActionColumn',
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
				'headerOptions' => ['width' => '10%'] 
			],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
