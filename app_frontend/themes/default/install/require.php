<?php

use Wskm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Wskm::t('Require', 'install');
?>

<div class="site-login">
    <h3><?= Wskm::t('Directory Write Permission', 'install') ?></h3>
	<table class="table table-hover">
		<tr>
			<th >Directory</th><th width="20%" >Result</th>
		</tr>
		<?php foreach ($dirs['paths'] as $dir): ?>
		<tr class="<?php echo $dir['isw'] ? '' :  'danger' ?>">
			<td>
			<?php echo $dir['dir'] ?>
			</td>
			<td>
			<span class="result"><?php echo $dir['isw'] ? Wskm::t('Passed', 'install') : Wskm::t('Failed', 'install') ?></span>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
    
	<h3><?= Wskm::t('Requirement Check', 'install') ?></h3>
    <table class="table table-hover">
		<tr>
			<th width="150" ><?= Wskm::t('Name', 'install') ?></th><th width="50"><?= Wskm::t('Result', 'install') ?></th><th><?= Wskm::t('Memo', 'install') ?></th>
		</tr>
		<?php foreach ($requires->result['requirements'] as $requirement): ?>
		<tr class="<?php echo $requirement['condition'] ? '' : ($requirement['mandatory'] ? 'danger' : 'warning') ?>">
			<td>
			<?php echo $requirement['name'] ?>
			</td>
			<td>
			<span class="result"><?php echo $requirement['condition'] ?  Wskm::t('Passed', 'install') : ($requirement['mandatory'] ? Wskm::t('Failed', 'install') : Wskm::t('Warning', 'install') ) ?></span>
			</td>
			<td>
			<?php echo $requirement['memo'] ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
			
	<hr >
	<div class="container-fluid" >
		<p>Requirements Check Errors : <?php echo $requires->result['summary']['errors'] ?></p>
		<p>Directory Write Permission Errors : <?php echo $requires->result['summary']['errors'] ?></p>
	</div>
	<hr >
	<div class="container-fluid text-center" >
		<?php if($requires->result['summary']['errors'] || $dirs['errors']){ ?>
		<a href="javascript:;" class="btn btn-danger">Refresh,Fulfil Requirements!</a>
		<?php }else{ ?>
		<a href="<?= Url::to(['param']) ?>" class="btn btn-success">Next Step</a>
		<?php } ?>
		<br><br><br>
	</div>
	
</div>
