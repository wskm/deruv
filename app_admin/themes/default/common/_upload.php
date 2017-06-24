<?= \wskm\web\Bower::getUploadStatic() ?>
<style>
	.popover-content {
		padding: 5px 0;
	}
</style>

<script>
	$(function(){
		$("#blockUpload").fileinput({
			language : "zh",
			uploadUrl : "<?= \yii\helpers\Url::to(['upload/file']) ?>",
			overwriteInitial: true,
			showClose: false,
			showCaption: false,
			showBrowse: false,
			browseOnZoneClick: true,
			removeLabel: '',
			removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			removeTitle: 'Cancel or reset changes',
			elErrorContainer: '#thumbUploadError',
			msgErrorClass: 'alert alert-block alert-danger',
			defaultPreviewContent: '<img src="<?= STATIC_URL.'img/thumb-add.png' ?>" alt="" style="width:100px;cursor: pointer;">',
			layoutTemplates: {main2: '{preview}'},
			uploadExtraData : { 
				'<?= Yii::$app->request->csrfParam ?>' : '<?= Yii::$app->request->getCsrfToken() ?>',
				plan : '<?= $plan ?>',
				<?php if($iscontent){ ?>
				content_id : curContentid,
				<?php } ?>
				preview : 1 
			},
			<?php if($model && $model->thumb){ ?>
			'initialPreview' : [
				"<img src='<?= $model->thumb ?>' class='file-preview-image kv-preview-data' style='width:<?= $plan ? 100 : 160 ?>px' >"
			],
			'initialPreviewConfig' : [
				{
					'width' : '160px',
					'url' : '<?= \yii\helpers\Url::to(['upload/del']) ?>',
					'extra' : {
						'url' : '<?= $model->thumb ?>'
					}
				},
			],
			layoutTemplates : {
				footer : '<div class="file-thumbnail-footer">\n' +
			'    {actions}\n' +
			'</div>'
			},
			<?php } ?>
			allowedFileExtensions: ["jpg", "jpeg", "png", "gif"]
		}).on('fileloaded', function(event, file, previewId, index, reader) {
			$('#blockUpload').fileinput('upload');
		}).on('fileuploaded', function(event, data, previewId, index) {
			var response = data.response; 
			if (response && response.initialPreviewConfig) {
				var imgurl = response.initialPreviewConfig[0].extra.img;
				var id = response.initialPreviewConfig[0].extra.id;
				$('#block-thumb').val(imgurl);
			}
			$('.fileinput-upload-button, .fileinput-remove-button').hide();
			console.log('fileuploaded');
		}).on('filedeleted', function(event, key, jqXHR, data) {
			console.log('filedeleted');
			$('#block-thumb').val('');
		}).on('fileuploaderror', function(event, data, msg) {
			tip(msg, '.kv-avatar');
			$('#blockUpload').fileinput('refresh').fileinput('enable');
		 }).on('filedeleteerror', function(event, data, msg) {
			tip(msg, '.kv-avatar');
			$('#block-thumb').val('');
			$('#blockUpload').fileinput('refresh').fileinput('enable');
		 });
			
	});
</script>
