<?php

use service\Block;
use yii\helpers\Html;

$this->title = \Wskm::t('Home');

$headlines= Block::shows('home_headline', 1);
$news = Block::shows('home_news');

?>
<div class="row">
	<div class="col-sm-8 col-xs-12 " >
		<?php if($headlines) { ?>
		<h2 style="padding-bottom: 10px;" ><a href="<?=$headlines['url']?>" ><?=$headlines['title']?></a></h2>
		<?php } ?>
		
		<?php if($news) { ?>
		<ul class="list-inline top-list " >
			<?php foreach($news as $v){ ?>
			<li><a href="<?=$v['url']?>" ><?=$v['title']?></a></li>
			<?php } ?>
		</ul>
		<?php } ?>

		<hr />
		
		<?php
		$slides = Block::shows('home_slideshow');
		if($slides){
		?>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
			  <?php foreach($slides as $v){ ?>
				<div class="item <?php if($v['index'] == 0){ ?>active<?php } ?>" >
					<a href="<?= $v['url'] ?>" ><img src="<?= $v['thumb'] ?>" alt="<?= $v['title'] ?>"  style="height:260px;width:630px" ></a>
				  <div class="carousel-caption">
					  <h3><?= $v['title'] ?></h3>
				  </div>
				</div>
		
			  <?php } ?>
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
		<?php } ?>

		<div class="cate-tabs " role="tabpanel" >
			<ul class="nav nav-tabs " role="tablist" >
				<?php 
					$catesAll = \service\Category::getCache();  
					$cates = [];
					$i = 0;
					
					foreach($catesAll as $v){
						if($v['parentid'] == 0){
							$cates[] = $v;
				?>
				<li role="presentation" <?php if($i ==0){ ?>class="active"<?php } ?> ><a href="#tab-<?= $v['key'] ?>" aria-controls="<?= $v['key'] ?>" role="tab" data-toggle="tab"><?= $v['name'] ?></a></li>
				<?php 
						} 
						$i++;
					} 
				?>
			</ul>
			<div id="wrap-tabs">
				<div class="tab-content">
					<?php
						foreach($cates as $i => $v){ 
							$contents = \service\Content::getCache($v['id'], 20);
					?>
					<div role="tabpanel" class="tab-pane <?php if($i ==0){ ?>active<?php } ?>" id="tab-<?= $v['key'] ?>">
						<?php foreach($contents as $row) { ?>
						<div class="media">
                            <?php if($row['thumb']){ ?>
							<a class="media-left" href="<?= Wskm::url(['article', 'id' => $row['id']]) ?>">
							  <img src="<?= $row['thumb'] ?>" alt="<?= $row['title'] ?>"  height="88" width="140" >
							</a>
                            <?php } ?>
							<div class="media-body">
                                <h4 class="media-heading"><a href="<?= Wskm::url(['article', 'id' => $row['id']]) ?>"><?= $row['title'] ?></a></h4>
							  <div class="media-foot" ><?= Yii::$app->formatter->asRelativeTime($row['updated_at']) ?></div>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				 
			</div>
		</div>
	</div>
	<?= $this->render('/common/side_right') ?>

</div>

<script>
	$('.carousel').carousel();
</script>