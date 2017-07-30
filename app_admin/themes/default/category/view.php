<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Wskm::t('Categorie', 'admin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

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
            'id',
            [ 
				'label' => Wskm::t('Parent category', 'category'),
				'value' => \service\Category::getInfoName($model->parentid) ,
			],
            'name',
            'key',
            'gourl:url',
            'tpl_list',
            'tpl_show',
            'sorting',
			[ 
				'attribute' => 'status',
				'value' => \common\models\Category::getStatusName($model->status),
			],
        ],
    ]) ?>

</div>
