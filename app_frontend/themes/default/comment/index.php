<?php

use service\Block;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = \Wskm::t('Comment').':'.$modelContent->title;

?>

<h2 style="margin: 10px 0 25px 0;"><?= \Wskm::t('Comment').': ' ?><a href="<?= \Wskm::url(['/article', 'id' => $modelContent->id ]) ?>"  ><?= $modelContent->title ?></a></h2>

<div class="row">
	<div class="col-sm-8 col-xs-12 " >
		<div class="comments-list" id='comments'>
			<?php if($comments) { ?>
			<ul class="media-list">
				
				<?php foreach($comments as $row){ ?>
				<li class="media">
					<a class="media-left" href="#">
					  <img src="<?= $row['avatar'] ? $row['avatar'] : './themes/default/img/avatar.png' ?>" class="img-circle" data-holder-rendered="true" style="width: 45px; height: 45px;">
					</a>
					<div class="media-body">
						<b class="media-heading"><?= $row['user_name'] ?></b>
                        
                        <?php if($row['user_id'] == Wskm::getUser()->id ){ ?>
                        <small class="pull-right"  >&nbsp;&nbsp;<a href='<?= Wskm::url(['/comment/update', 'id' => $row['id']]) ?>' target="_blank" class="edit glyphicon glyphicon-pencil" ></a>&nbsp;&nbsp;<a href='javascript:;' data-id='<?= $row['id'] ?>' class="del glyphicon glyphicon-trash" ></a></small>
                        <?php }  ?>
                        
                        <small class="pull-right" style="color:gray" ><?= Yii::$app->formatter->asRelativeTime($row['created_at']) ?></small>
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
				'content_id' => $modelContent->id,
                'comment' => new stdClass(),
			]) ?>
	</div>
	
	<?= $this->render('/common/side_right') ?>
</div>
<script>
    $('#comments .del').each(function(i, em){
        var obj = $(em);
        obj.click(function(){
            if (confirm('<?= \Wskm::t('Are you sure you want to delete this item?', 'yii') ?>')) {
                $.getJSON('<?= Wskm::url(['/comment/delete']) ?>', { id : obj.data('id') }, function(data){
                    if (data.error) {
                        alert(data.error);
                        return;
                    }   
                    obj.parents('.media:first').fadeOut();
                }).error(function(a, b, msg){
                    alert(msg);
                });
            }
        });
    });
</script>