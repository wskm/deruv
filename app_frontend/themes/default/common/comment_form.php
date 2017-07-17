            <h3><?= \Wskm::t('Comment') ?></h3>
			<div class="container-fluid view-comment" >

				<form class="form-horizontal" id="formComment" action="<?=$comment->id ? Wskm::url([ '/comment/update', 'id' => $comment->id]) : Wskm::url([ '/comment/create', 'id' => $content_id]) ?>" method="post" role="form">
					<div class="form-group">
						<textarea class="form-control"id="msg" name="msg" rows="4"><?= $comment->msg ?></textarea>
					</div>
					<div class="form-group" style="text-align: right;">
						<button type="submit" class="btn btn-default"><?= \Wskm::t('Submit') ?></button>
					</div>
				</form>
				<script>
					$('#formComment').submit(function(){
						var objMsg = $('#msg');
						var msg = $.trim(objMsg.val());
						if (!msg) {
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