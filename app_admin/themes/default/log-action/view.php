<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\models\LogAction */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Log Action'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-action-view">
	<?php if(!$isajax) { ?>
    <p>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-default glyphicon glyphicon-trash text-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
	<?php }else { ?>
	
	<?php } ?>

    <?= DetailView::widget([
        'model' => $model,
		'options' => ['class' => 'table table-hover detail-view'],
        'attributes' => [
            'id',
            'user_id',
            'user_name',
            'url:url',
            'title',
            'type',
			[
				'attribute' => 'level',  
				'value'=> \service\Log::getListLevel()[$model->level],
			],
            'created_at:datetime',
        ],
    ]) ?>

</div>
