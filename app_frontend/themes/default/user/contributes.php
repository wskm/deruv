<?php

use yii\helpers\Html;
use wskm\grid\GridView;

$this->title = \Wskm::t('Contributes', 'user');
?>
<ul class="nav nav-tabs">
	<li role="presentation" ><a href="<?= Wskm::url(['user/index']) ?>"><?= \Wskm::t('Profile', 'user') ?></a></li>
	<li role="presentation" class="active" ><a href="<?= Wskm::url(['user/contributes']) ?>"><?= \Wskm::t('Contributes', 'user') ?></a></li>
	<li role="presentation"><a href="<?= Wskm::url(['user/contribute']) ?>"><?= \Wskm::t('Contribute', 'user') ?></a></li>
</ul>
<div class="user-wrap">
	<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'tableOptions' => ['class' => 'table table-hover'],
			'columns' => [
				//'id',
				[  
					'label' => \Wskm::t('Category', 'admin'),  
					'attribute' => 'category_id',  
					'value'=> function($data){
						return \service\Category::getInfoName($data->category_id);
					} 
				],
				//'user_id',
				//'user_name',
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
					'template' => '{preview}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
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
</div>