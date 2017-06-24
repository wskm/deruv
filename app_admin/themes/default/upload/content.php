<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Url;

$this->title = \Wskm::t('Upload');
?>
<div class="container-fluid">
	<div style="padding:15px 0;" >
		<input id="layerUpload" type="file" class="file file-loading" data-show-preview="false" name="Uploads[file]" multiple data-max-file-count="1"  data-drop-zone-enabled="false" data-language="zh" data-upload-url="<?=Url::to(['/upload/file'])?>">

	</div>
	<div id="uploadContentWrap" >
		<?php foreach($list as $row){ 
			$row['url'] = \Wskm::getUploadUrl().$row['url'];
		?>
		<?php if ($row['type'] == 'image' ) { ?>
		<div id="uploadFile-<?=$row['id']?>" style="margin: 5px;text-align: center;width:70px; height:70px; position: relative;overflow: hidden;"  class="pull-left" >		
			<img src="<?=$row['url']?>" height="70"   class="img-rounded">
			<a href="javascript:;" onclick="uploadRowDel(<?=$row['id']?>)"  ><span class="glyphicon glyphicon-trash text-danger " style="position: absolute;font-size: 10px;left:18px;bottom: 6px;top: auto;" ></span></a>
			<a href="javascript:;" onclick="uploadRowFile('<?=$row['url']?>', '<?=$row['name']?>', '<?=$row['type']?>', '<?=$row['id']?>', '<?=$row['width']?>')" ><span class="glyphicon glyphicon-plus" style="position: absolute;font-size: 10px;right: 18px;bottom: 6px;top: auto;color: #333;" ></span></a>
		</div>
		<?php }else{ ?>
		<div id="uploadFile-<?=$row['id']?>" style="margin: 5px;text-align: center;width:70px; height:70px;border-radius: 6px; border: 1px solid #dcdcdc; position: relative;overflow: hidden;"  class="pull-left" >		
				<b style="font-size: 14px;display: inline-block;margin-top: 18px;" class="glyphicon glyphicon-file text-success" ><?=$row['type']?></b>
				<a href="javascript:;" onclick="uploadRowDel(<?=$row['id']?>)" ><span class="glyphicon glyphicon-trash text-danger " style="position: absolute;font-size: 10px;left:18px;bottom: 6px;top: auto;" ></span></a>
				<a href="javascript:;" onclick="uploadRowFile('<?=$row['url']?>', '<?=$row['name']?>', '<?=$row['type']?>', '<?=$row['id']?>')" ><span class="glyphicon glyphicon-plus" style="position: absolute;font-size: 10px;right: 18px;bottom: 6px;top: auto;" ></span></a>
		</div>
		<?php } } ?>
		
	</div>
</div>
