<?php

use yii\widgets\DetailView;

$this->title = \Wskm::t('Profile');

\yii\bootstrap\BootstrapPluginAsset::register($this);

$model = \Wskm::getUser();
?>

<ul class="nav nav-tabs">
	<li role="presentation" class="active" ><a href="<?= Wskm::url(['user/index']) ?>"><?= \Wskm::t('Profile', 'user') ?></a></li>
	<li role="presentation"><a href="<?= Wskm::url(['user/contributes']) ?>"><?= \Wskm::t('Contributes', 'user') ?></a></li>
	<li role="presentation"><a href="<?= Wskm::url(['user/contribute']) ?>"><?= \Wskm::t('Contribute', 'user') ?></a></li>
</ul>

<div class="user-wrap">
	<?=
	DetailView::widget([
		'model' => $model,
		'options' => ['class' => 'table detail-view'],
		'attributes' => [
			[
				'captionOptions' => [ 'style' => 'border-top:0;' ],
				'contentOptions' => [ 'style' => 'border-top:0;' ],
				'format' => 'raw',
				'label' => '',
				'attribute' => 'avatar',
				'value' => $model->avatar ? "<img src='{$model->avatar}' class='img-circle'  height='".\service\User::getAvatarDefaultHeight()."' />" : '',
			],
			'username',
			'id',
			'email:email',
			[
				'format' => 'datetime',
				'attribute' => 'created_at',
				'label' => \Wskm::t('Signup At', 'user'),
			],
		],
	])
	?>
</div>