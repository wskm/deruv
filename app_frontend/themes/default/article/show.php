<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = $model->title;

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->article->seo_keywords
], 'keywords');

$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->article->seo_description
], 'description');

$this->params['breadcrumbs'][] = ['label' => $category['name'], 'url' => ['/category', 'id' => $category['id']]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
	<div class="col-sm-8 col-xs-12 " >

		<div class="view-wrap" >
			<?= Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>

			<h2><?= $model->title ?></h2>
			<div class="view-time clearfix" >
				<span class="pull-left" ><?= Yii::$app->formatter->asDatetime($model->updated_at) ?>　<!--org--></span>
				<span class="pull-right" style="font-size:10px" >
					<b class="glyphicon glyphicon-eye-open"></b>&nbsp;<span id="content-pv"><?= $model->pv ?></span>&nbsp;&nbsp;&nbsp;
					<a href="<?= \Wskm::url(['/comment', 'id' => $model->id ]) ?>" ><b class="glyphicon glyphicon-comment"></b>&nbsp;<span id="content-comment"><?= $model->comment ?></span></a>
				</span>
			</div>

			<div class="view-text " >
				<?= $model->article->detail ?>
			</div>
			<hr />

			<!--
			<h3>Related Reading</h3>
			<div class="view-related clearfix" >

				<div class="view-related-row clearfix" >
				  <div class="pull-left" ><img src="./img/test3.jpg" alt="..."  height="88" width="140" ></div>
				  <div class="pull-left desc" >xxx</div>
				</div>

			</div>
			-->
			
			<?php if($model->iscomment){ ?>
			<?= $this->render('/common/comment_form', [
				'content_id' => $model->id
			]) ?>
			<?php } ?>

		</div>

	</div>
	
	<?= $this->render('/common/side_right') ?>
	
</div>
<script>
	$(function(){
		statContent('<?= Wskm::url(['stat/content', 'id' => $model->id]) ?>');
	});
</script>