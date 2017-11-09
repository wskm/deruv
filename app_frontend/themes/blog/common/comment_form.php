			<div class="comment-wrap" >

				<form  id="formComment" action="<?=$comment->id ? Wskm::url([ '/comment/update', 'id' => $comment->id]) : Wskm::url([ '/comment/create', 'id' => $content_id]) ?>" method="post" role="form">
					<div class="input-row">
						<textarea class="input-msg"id="commentMsg" name="msg" rows="4"><?= $comment->msg ?></textarea>
					</div>
					<div class="input-row" style="text-align: right;">
						<button type="submit" class="debtn debtn-default"><?= \Wskm::t('Submit') ?></button>
					</div>
				</form>
				<script>
					$('#formComment').submit(function(){
						var objMsg = $('#commentMsg');						
						if (!$.trim(objMsg.val())) {
							objMsg.val('');
							alert('<?php echo \Wskm::t('{attribute} cannot be blank.', 'yii',[
								'attribute' => \Wskm::t('Comment'),
							]) ?>');
							return false;
						}
						return true;
					});
				</script>
			</div>