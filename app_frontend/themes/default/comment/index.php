<?php

use service\Block;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = \Wskm::t('Comment').':'.$modelConent->title;

?>

<h2 style="margin: 10px 0 25px 0;"><?= \Wskm::t('Comment').': ' ?><a href="<?= \Wskm::url(['/article', 'id' => $modelConent->id ]) ?>"  ><?= $modelConent->title ?></a></h2>

<div class="row">
	<div class="col-sm-8 col-xs-12 " >
		<div class="comments-list">
			<?php if($comments) { ?>
			<ul class="media-list">
				
				<?php foreach($comments as $row){ ?>
				<li class="media">
					<a class="media-left" href="#">
					  <img src="<?= $row['avatar'] ? $row['avatar'] : './themes/default/img/avatar.png' ?>" class="img-circle" data-holder-rendered="true" style="width: 45px; height: 45px;">
					</a>
					<div class="media-body">
						<b class="media-heading"><?= $row['user_name'] ?></b><small class="pull-right" style="color:gray" ><?= Yii::$app->formatter->asRelativeTime($row['created_at']) ?></small>
						<p><?= $row['msg'] ?></p>
					</div>

				</li>
				<?php } ?>
			</ul>
			<?php }else{ ?>
			<?= Wskm::t('No results found.', 'yii') ?>
			<?php } ?>
			<div class="page-wrap">
			<?php echo LinkPager::widget([
				'pagination' => $pages,
			]); ?>
			</div>
			
		</div>
		
		<?= $this->render('/common/comment_form', [
				'model' => $modelConent
			]) ?>
	</div>
	
	<?= $this->render('/common/side_right') ?>
</div>