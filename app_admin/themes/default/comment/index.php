<?php

use yii\helpers\Html;
use wskm\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comment');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-default glyphicon glyphicon-plus-sign text-success']) ?>
    </p>
-->
	<?php Pjax::begin([
		'id' => 'comment-pjax',
		'linkSelector' => '#comment-pjax a[target!=_blank]',
	]); ?>      
	<?= GridView::widget([
		'searchHtml' => $this->render('_search', ['model' => $searchModel]),
		'dataProvider' => $dataProvider,
        'columns' => [

            [  
				'attribute' => 'id',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
				'headerOptions' => [  
					'width' => '5%'  
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
				'attribute' => 'user_name',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
				'headerOptions' => [  
					'width' => '90'  
				],				
			], 
			[  
				'attribute' => 'msg',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],				
				'value'=> function($data){
					return \wskm\helper\StringHelper::substr($data->msg, 0,50);
				}
			],
			[  
				'attribute' => 'status',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
				'headerOptions' => [  
					'width' => 60  
				],
				'value'=> function($data){
					return \common\models\Comment::getListStatus()[$data->status];
				} 
			],
			[  
				'attribute' => 'ip',  
				'contentOptions' => [ 'style'=> 'vertical-align: middle;' ],
				'headerOptions' => [  
					'width' => '100'  
				],				
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
				'headerOptions' => ['width' => '10%'] ,
				'template' => '{preview}&nbsp;&nbsp;{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
				'buttons' => [
					'preview' => function ($url, $model, $key) {
						return  Html::a('<span class="glyphicon glyphicon-globe "></span>', \Wskm::url(['/comment', 'id' => $model->content_id ]), [
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
