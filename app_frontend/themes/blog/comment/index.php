<?php

use service\Block;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = \Wskm::t('Comment').':'.$modelContent->title;

?>
<link rel="stylesheet" href="<?= WEB_URL ?>themes/blog/css/view.css" type="text/css">
<script src="<?= WEB_URL ?>bower/art-template/lib/template-web.js" ></script>
<script src="<?= WEB_URL ?>bower/jqPaginator.min.js" ></script>

<h2 style="margin: 10px 0 25px 0;"><?= \Wskm::t('Comment').': ' ?><a href="<?= \Wskm::url(['/article', 'id' => $modelContent->id ]) ?>"  ><?= $modelContent->title ?></a></h2>

<div class="comments-list" id='comments'>
    <?php if($comments) { ?>
    <form  id="form-reply" action="<?=Wskm::url([ '/comment/create', 'id' =>  $modelContent->id]) ?>" method="post" role="form">
    <input type="hidden" name="parent_id" id="parent_id" value="0" />
    <input type="hidden" name="reply_id" id="reply_id" value="0" />
    <input type="hidden" name="reply_name" id="reply_name" value="" />
    <input type="hidden" name="msg" id="reply_msg" value="" />
        
    <ul class="media-list">

        <?php foreach($comments as $row){ ?>
        <li class="media" id="comment-<?= $row['id'] ?>" >
            <a class="media-left" href="<?= Wskm::url(['/user/show', 'id' => $row['user_id']]) ?>" target="_blank" >
              <img src="<?= $row['avatar'] ? $row['avatar'] : WEB_URL.'themes/default/img/avatar.png' ?>" class="img-circle" data-holder-rendered="true" style="width: 45px; height: 45px;">
            </a>
            <div class="media-body">
                <b class="media-heading"><?= $row['user_name'] ?></b>&nbsp;&nbsp;<small><a href='javascript:;' data-reply="<?= $row['reply'] ?>" data-first="1" data-id="<?= $row['id'] ?>" data-userid="<?= $row['user_id'] ?>" data-username="<?= $row['user_name'] ?>" class="comment-reply" ><?= Wskm::t('Reply') ?></a></small>
                &nbsp;&nbsp;<small><a href='javascript:;'  data-id="<?= $row['id'] ?>" class="reply-show" ><?= $row['reply'] ?><?= Wskm::t('Comment') ?></a></small>
                <?php if($row['user_id'] == Wskm::getUser(false)->id ){ ?>
                <small>&nbsp;&nbsp;<a href='<?= Wskm::url(['/comment/update', 'id' => $row['id']]) ?>' target="_blank" ><?= Wskm::t('Update') ?></a>&nbsp;&nbsp;<a href='javascript:;' data-id='<?= $row['id'] ?>' class="comment-del" ><?= Wskm::t('Delete') ?></a></small>
                <?php }  ?>
                &nbsp;&nbsp;<small style="color:gray" ><?= Yii::$app->formatter->asRelativeTime($row['created_at']) ?></small>
                <p><?= $row['msg'] ?></p>
                
                <div id="subcomment-<?= $row['id'] ?>" style="display:none" class="subcomment-list" ></div>                

                <div class="media" style="display:none" id="reply-<?= $row['id'] ?>" >
                    <div class="media-body">
                        <textarea class="input-msg" rows="3"></textarea>
                        <div style="text-align: right;" >
                            <button type="button" class="debtn debtn-default cancel"><?= \Wskm::t('Cancel') ?></button>&nbsp;
                            <button type="submit" class="debtn debtn-success submit"><?= \Wskm::t('Submit') ?></button>
                        </div>
                    </div>
                </div>                                
                
            </div>

        </li>
        <?php } ?>
    </ul>
    </form>
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

<script id="replyRow" type="text/html">
    {{each list row i}}
    <div class="media">
        <div class="media-reply" >
            <a href="{{row.user_url}}" class="author" target="_blank" >{{row.user_name}}</a>&nbsp;&nbsp;<a href='javascript:;' data-id="{{row.parent_id}}" data-userid="{{row.user_id}}" data-username="{{row.user_name}}"  class="comment-reply" style="color:gray" ><?= Wskm::t('Reply') ?></a>
            &nbsp;&nbsp;<a href='javascript:;' style="color:gray" data-id='{{row.id}}' class="comment-del" ><?= Wskm::t('Delete') ?></a></small>
            &nbsp;&nbsp;{{row.created_at}}
        </div>
        <div class="media-body">{{row.msg}}</div>
    </div>
    {{/each}}
</script>

<script>
       
    function initReplyRow(em, isfrist) {
        $(em + ' .comment-reply').each(function(i, em){
            var obj = $(em);
            var commentId = obj.data('id');
            var replyId = obj.data('userid');
            var replyName = obj.data('username');
            var first = obj.data('first');
            var replyCount = parseInt(obj.data('reply'));

            var msgRow = $('#reply-' + commentId);
            var msg = msgRow.find('.input-msg:first');
            if (!msgRow || !msg) {
                return;
            }

            obj.click(function(){
                $('#parent_id').val(commentId);
                $('#reply_id').val(replyId);
                $('#reply_name').val(replyName);

                msgRow.show();
                msg.focus();
                
                if(!first){
                    msg.val('@' + replyName + ' ');
                }else{
                    msg.val('');
                }
                
            });

            $('#comment-' + commentId + ' .cancel:first').click(function(){
                msgRow.hide();
            });

            $('#comment-' + commentId + ' .submit:first').click(function(){
                var msgVal = $.trim(msg.val());
                if (!msgVal) {
                    msg.val('');
                    alert('<?php echo \Wskm::t('{attribute} cannot be blank.', 'yii',[
                        'attribute' => \Wskm::t('Comment'),
                    ]) ?>');
                    return false;
                }

                $('#reply_msg').val(msgVal);
                $('#form-reply').submit();
                return true;
            });
            
            if(isfrist){
                $('#comment-' + commentId + ' .reply-show:first').click(function(){
                    var subComment = $('#subcomment-' + commentId);
                    subComment.toggle();
                    
                    var getChildren = function(p){
                        subComment.html('load...');
                        $.getJSON('<?= Wskm::url(['/comment/children']) ?>', { id : commentId, p : p }, function(data){
                            if(!data.length){
                                subComment.html('<?= \Wskm::t('No results found.', 'yii') ?>');
                                return;
                            }

                            subComment.html('');

                            var html = template('replyRow', { list : data });
                            
                            var pageTotal = Math.ceil(replyCount / 15, 1);
                            if(pageTotal > 1){
                                html += '<div id="commentpage-' + commentId + '" class="pagination pagination-sm" ></div>';                                
                            }
                            
                            subComment.append(html);                                                                                    
                            
                            initReplyRow('#subcomment-' + commentId, false);
                            if(pageTotal > 1){
                                initReplyPage('#commentpage-' + commentId, pageTotal, p, function(n){
                                    if(p != n) getChildren(n);
                                });
                            }
                        });
                    };

                    if(!subComment.is(':hidden')){                                                                         
                        getChildren(1);
                    }

                });
            }

        });

        $(em + ' .comment-del').each(function(i, em){
            var obj = $(em);
            obj.click(function(){
                if (confirm('<?= \Wskm::t('Are you sure you want to delete this item?', 'yii') ?>')) {
                    $.getJSON('<?= Wskm::url(['/comment/delete']) ?>', { id : obj.data('id') }, function(data){
                        if (data.error) {
                            alert(data.error);
                            return;
                        }   
                        obj.parents('.media:first').fadeOut();
                    });
                }
            });
        });
    }
    
    function initReplyPage(em, totalPages, currentPage, callChange) {
        $(em).jqPaginator({
            totalPages: totalPages,
            visiblePages: 10,
            currentPage: currentPage,
            last: false,
            first: false,
            prev: '<li class="prev"><a href="javascript:void(0);">&lt;<\/a><\/li>',
            next: '<li class="next"><a href="javascript:void(0);">&gt;<\/a><\/li>',
            page: '<li class="page"><a href="javascript:void(0);">{{page}}<\/a><\/li>',
            onPageChange: callChange
        });
    }
    
    initReplyRow('#comments', true);
    
</script>