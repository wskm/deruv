<?php

use yii\helpers\Html;
use service\Content;

$this->title = $model->title;

$UrlPrevious = Content::getUrlPrevious($model->id);
$UrlNext = Content::getUrlNext($model->id);

?>
<link rel="stylesheet" href="./themes/blog/css/view.css" type="text/css">

<div class="post">

    <h1><?= $model->title ?></h1>
	<div class="author">
        <a href="javascript:;" class="avatar" ><img src="<?php if($model->user->avatar){ ?><?= $model->user->avatar ?><?php }else{ ?>themes/default/img/avatar.png<?php } ?>" alt="144"></a>
		<div class="author-info" >
			<div class="author-name"><?= $model->user_name ?></div>
            <div class="author-meta">
                <span class="date" ><?= Yii::$app->formatter->asDatetime($model->updated_at) ?></span>
                &nbsp;&nbsp;<a href="<?= Wskm::url(['/category', 'id' => $category['id']]) ?>" ><?= $category['name'] ?></a>
                &nbsp;&nbsp;<a ><?= Wskm::t('View') ?>&nbsp;<span id="content-pv"><?= $model->pv ?></span></a>
                &nbsp;&nbsp;<a href="<?= \Wskm::url(['/comment', 'id' => $model->id ]) ?>" ><?= Wskm::t('Comment') ?>&nbsp;<span id="content-comment"><?= $model->comment ?></span></a>
            </div>
		</div>
	</div>

    <div class="content">
        <?= $model->article->detail ?>
    </div>
            
    <?php if(isset($UrlPrevious['id'])){ ?>
    <a id="newer" class="blog-nav" href="<?= Wskm::url(['/article', 'id' => $UrlPrevious['id']] ) ?>">&lt;&nbsp;<?= Wskm::t('Newer') ?></a>
    <?php } ?>
    <?php if(isset($UrlNext['id'])){ ?>
    <a id="older" class="blog-nav" href="<?= Wskm::url(['/article', 'id' => $UrlNext['id']] ) ?>"><?= Wskm::t('Older') ?>&nbsp;&gt;</a>
    <?php } ?>
</div>

<?php if($model->iscomment){ ?>
<?= $this->render('/common/comment_form', [
    'content_id' => $model->id
]) ?>
<?php } ?>

<script>
	$(function(){
		statContent('<?= Wskm::url(['stat/content', 'id' => $model->id]) ?>');
	});
</script>