<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\models\LogLogin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Log Login'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-login-view">

    <p>
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
            'user_name',
            'password',
            'ip',
			[  
				'attribute' => 'status',
				'value' => \wskm\Status::getFailOrSuccess()[$model->status],
			],
            'login_time:datetime',
        ],
    ]) ?>

</div>
