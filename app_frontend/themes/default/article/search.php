<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;

$this->title = Wskm::t('Search');

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-sm-8 col-xs-12 " >

		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?>
		
		<div class="content-list" >
			<?php if($list) { ?>
			<?php foreach($list as $row){ ?>
			<div class="media">
				<div class="media-body">
					<h4 class="media-heading"><a href="<?= Wskm::url(['article', 'id' => $row['id']]) ?>"><?= $row['title'] ?></a></h4>
					<div class="media-foot"><?= Yii::$app->formatter->asRelativeTime($row['updated_at']) ?></div>
				</div>
			</div>
			<?php } ?>
			
			<div class="page-wrap">
			<?php echo LinkPager::widget([
				'pagination' => $pages,
			]); ?>
			</div>
			<?php }else{ ?>
			<?= Wskm::t('No results found.', 'yii') ?>
			<?php } ?>
			
		</div>

	</div>
	
	<?= $this->render('/common/side_right') ?>
	
</div>