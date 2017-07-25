<?php

use yii\helpers\Html;
use wskm\grid\GridView;

\yii\bootstrap\BootstrapPluginAsset::register($this);

$this->title = \Wskm::t('Contributes', 'user');
?>
<div class="bs-wrap user-font">
    <ul class="nav nav-tabs">
        <li role="presentation" ><a href="<?= Wskm::url(['user/index']) ?>"><?= \Wskm::t('Profile', 'user') ?></a></li>
        <li role="presentation" class="active" ><a href="<?= Wskm::url(['user/contributes']) ?>"><?= \Wskm::t('Contributes', 'user') ?></a></li>
        <li role="presentation"><a href="<?= Wskm::url(['user/contribute']) ?>"><?= \Wskm::t('Contribute', 'user') ?></a></li>
    </ul>
    <div class="user-wrap" >
	<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'tableOptions' => ['class' => 'table table-responsive table-hover'],
            'layout' => "{items}\n<div class='pull-right'>{pager}</div>",
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
				// 'pv',
				 //'comment',
				 [  
					'format' => 'raw',
					'attribute' => 'status',  
                    'label' => '',
					'headerOptions' => [  
						'width' => 30  
					],
					'value'=> function($data){
						return \wskm\Status::getIcons()[$data->status];
					} 
				], 
                /*
				[  
					'format' => 'datetime',
					'attribute' => 'updated_at',  
					'headerOptions' => [  
						'width' => 160  
					],
				], 
                */
				[
					'class' => 'yii\grid\ActionColumn',
					'headerOptions' => ['width' => '80px'],
					'template' => '{preview}&nbsp;{update}&nbsp;{delete}',
					'buttons' => [
						'preview' => function ($url, $model, $key) {
							return  Html::a('<span class="glyphicon glyphicon-globe "></span>', \Wskm::url(['/article', 'id' => $model->id ]), [
								'title' => \Wskm::t('Preview', 'admin'),
								'target' => '_blank',
							] ) ;
						},
                        'update' => function ($url, $model, $key) {
							return  Html::a('<span class="glyphicon glyphicon-pencil "></span>', \Wskm::url(['/user/contribute-update', 'id' => $model->id ]), [
								'title' => \Wskm::t('update'),
							] ) ;
						},
                       
					],
					
				],
			],
		]); ?>
</div>
</div>
