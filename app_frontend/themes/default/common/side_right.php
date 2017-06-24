
<div class="col-sm-4 hidden-xs" >

	<div class="panel "   >
	  <!-- Default panel contents -->
	  <div class="panel-heading panel-head-bg" >热门排行</div>
	  <!-- List group -->
	  <ul class="list-group">
			<?php 
			$hots = \service\Content::getRanking('pv');
			foreach($hots as $v){
			?>
			<li class="list-group-item"><a href="<?= \Wskm::url(['content/view', 'id' => $v['id']]) ?>" ><?= $v['title'] ?></a></li>
			<?php } ?>
	  </ul>
	</div>

	<div class="panel "   >
	  <!-- Default panel contents -->
	  <div class="panel-heading panel-head-bg" >编辑推荐</div>
	  <!-- List group -->
	  <ul class="list-group">
		  <?php 
			$ranks = \service\Block::shows('ranking_recommend', 10);
			foreach($ranks as $v){
			?>
			<li class="list-group-item"><a href="<?= $v['url'] ?>" ><?= $v['title'] ?></a></li>
			<?php } ?>
	  </ul>
	</div>


</div>