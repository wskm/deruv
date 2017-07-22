<?php

use service\Block;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = \Wskm::t('Update').':'.\Wskm::t('Comment');

?>

<h2 style="margin: 10px 0 25px 0;"><a href="<?= \Wskm::url(['/article', 'id' => $modelContent->id ]) ?>"  ><?= $modelContent->title ?></a></h2>

<div class="row">
	<div class="col-xs-12 " >
		
		<?= $this->render('/common/comment_form', [
				'content_id' => $modelContent->id,
                'comment' => $model
			]) ?>
	</div>
	
</div>