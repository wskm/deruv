<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use wskm\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Content');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">
	
	<p>
		<?= Html::a(Wskm::t('Add'), ['create'], ['class' => 'btn btn-default glyphicon glyphicon-plus-sign text-success']) ?>
	</p>
	
		<?php Pjax::begin([
			'id' => 'content-pjax',
			'linkSelector' => '#content-pjax a[target!=_blank]',
		]); ?>    
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'searchHtml' => $this->render('_search', ['model' => $searchModel]),
			'columns' => [
				'id',
				[  
					'label' => \Wskm::t('Category', 'admin'),  
					'attribute' => 'category_id',  
					'value'=> function($data){
						return \service\Category::getInfoName($data->category_id);
					} 
				],
				//'user_id',
				'user_name',
				//'thumb',
				[  
					'attribute' => 'title',  
					'contentOptions' => [  
						'style' => 'white-space: normal;'  
					],
				],
				// 'summary',white-space: normal;
				 'pv',
				 //'comment',
				 [  
					'format' => 'raw',
					'attribute' => 'status',  
					'headerOptions' => [  
						'width' => 60  
					],
					'value'=> function($data){
						return \wskm\Status::getIcons()[$data->status];
					} 
				], 
				// 'created_at',
				[  
					'format' => 'datetime',
					'attribute' => 'updated_at',  
					'headerOptions' => [  
						'width' => 160  
					],
				], 

				[
					'class' => 'yii\grid\ActionColumn',
					'headerOptions' => ['width' => '11%'],
					'template' => '{preview}&nbsp;&nbsp;{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
					'buttons' => [
						'preview' => function ($url, $model, $key) {
							return  Html::a('<span class="glyphicon glyphicon-globe "></span>', \Wskm::url(['article', 'id' => $model->id ]), [
								'title' => \Wskm::t('Preview', 'admin'),
								'target' => '_blank',
							] ) ;
						},
					],
					
				],
			],
		]); ?>
		<?php Pjax::end(); ?>

	
</div>
