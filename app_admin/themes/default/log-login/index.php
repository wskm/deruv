<?php

use yii\helpers\Html;
use wskm\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel admin\models\LogLoginSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Log Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-login-index">
	
<?php Pjax::begin(); ?>    <?= GridView::widget([
		'searchHtml' => $this->render('_search', ['model' => $searchModel]),
		'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'user_name',
            'password',
            'ip',
            // 'user_agent',
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
			[  
				'format' => 'datetime',
				'attribute' => 'login_time',  
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
