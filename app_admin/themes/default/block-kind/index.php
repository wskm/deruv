<?php

use yii\helpers\Html;
use wskm\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'BlockKind');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-kind-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-default glyphicon glyphicon-plus-sign text-success']) ?>
    </p>
	
    <?= GridView::widget([
		'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'name',
            'key',
			[  
				'attribute' => 'sorting',  
				'label' => \Wskm::t('Sorting'),
				'headerOptions' => [  
					'width' => 100  
				]  
			], 

            [
				'class' => 'yii\grid\ActionColumn',
				'headerOptions' => ['width' => '10%'] 
			],
        ],
    ]); ?>
</div>
