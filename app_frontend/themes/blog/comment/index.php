<?php

use service\Block;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = \Wskm::t('Comment').':'.$modelContent->title;

?>
<link rel="stylesheet" href="<?= WEB_URL ?>themes/blog/css/view.css" type="text/css">

<h2 style="margin: 10px 0 25px 0;"><?= \Wskm::t('Comment').': ' ?><a href="<?= \Wskm::url(['/article', 'id' => $modelContent->id ]) ?>"  ><?= $modelContent->title ?></a></h2>

<div class="comments-list" id='comments'>
    <?php if($comments) { ?>
    <ul class="media-list">

        <?php foreach($comments as $row){ ?>
        <li class="media">
            <a class="media-left" href="#">
              <img src="<?= $row['avatar'] ? $row['avatar'] : WEB_URL.'themes/default/img/avatar.png' ?>" class="img-circle" data-holder-rendered="true" style="width: 45px; height: 45px;">
            </a>
            <div class="media-body">
                <b class="media-heading"><?= $row['user_name'] ?></b>
                <small  style="color:gray" ><?= Yii::$app->formatter->asRelativeTime($row['created_at']) ?></small>
                
                <?php if($row['user_id'] == Wskm::getUser(false)->id ){ ?>
                <small  >&nbsp;&nbsp;<a href='<?= Wskm::url(['/comment/update', 'id' => $row['id']]) ?>' target="_blank" ><?= Wskm::t('Update') ?></a>&nbsp;&nbsp;<a href='javascript:;' data-id='<?= $row['id'] ?>' class="del" ><?= Wskm::t('Delete') ?></a></small>
                <?php }  ?>
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
        'options' => ['class' => 'pagination pagination-sm'] 
    ]); ?>
    </div>

</div>

<hr>

<?= $this->render('/common/comment_form', [
        'content_id' => $modelContent->id,
        'comment' => new stdClass(),
    ]) ?>
	
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