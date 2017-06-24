<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Wskm::t('Block', 'admin');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('js/edit.min.js');

?>
<script>
	var curContentid = 0;
</script>
<?= $this->render('/common/_upload',[
	'plan' => 2,
	'iscontent' => true,
]) ?>

<div class="block-index">
	<?php if($kinds) { ?>
		<div class="container-fluid" style="padding:0;" >

			<div class="col-sm-3 attrbox-left" style="padding:0;overflow: hidden;" >
				 <ul class="snav-stacked">
			     <?php foreach($kinds as $row){ ?>
				 <li upid="<?= $row['id'] ?>" key="<?= $row['key'] ?>" >
					 <a href="javascript:;" class="stacked-name" style="padding-right:10px" ><?= \Wskm::t($row['name'], 'admin') ?>
					 
					 </a>
				 </li>
				 <?php } ?>
				 
				</ul>
			</div>
			<div class="col-sm-9 attrbox-right"  >
				&nbsp;<small><mark style="color: gray;" id="kind-key" ></mark></small>
				<table class="table table-hover " id="stackedTable" >
				<thead>
				  <tr>
					<th><?= \Wskm::t('Title') ?></th>
					<th width="20%" ><?= \Wskm::t('Sorting') ?></th>
					<th width="15%" ></th>
				  </tr>
				  <tr id="site-load" style="display:none" >
				   <th colspan="5" >
					<div class="table-load">
					  <div class="bounce1"></div>
					  <div class="bounce2"></div>
					  <div class="bounce3"></div>
					</div>
				  </th>
				 </tr>
				</thead>
				<tbody id="stackedWrap" >

				</tbody>
				<tfoot>
					<tr id="addRow" >
						<td colspan="5">
						
							<button type="button" class="btn btn-default" onclick="blockAdd()" >
								<b class="glyphicon glyphicon-plus-sign text-success"  ></b><?= \Wskm::t('Add') ?>
							</button>

						</td>

					  </tr>
				</tfoot>
			  </table>

			</div>
	 </div>
	<?php }else{ ?>
	<?= Html::a(Yii::t('app', 'Create'), ['block-kind/create'], ['class' => 'btn btn-default glyphicon glyphicon-pencil text-success']) ?>
	<?php } ?>
</div>
<div class="modal fade" id="blockAddModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">

	  <div class="modal-body">
		  <form action="<?= Url::to(['block/create']) ?>" method="post" id="formCreate" >
			<?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->getCsrfToken()) ?>
			<div class="form-group">
				<label for="groupName"><?= \Wskm::t('Title')?></label>
				<div class="input-group">
					<input type="text" class="form-control" autocomplete="off"  name="Block[title]" id="block-title" placeholder="" maxlength="100" data-container="body" data-toggle="popover" data-trigger="manual" data-html="true" data-placement="bottom" data-content="" p>
					  <span class="input-group-btn">
						<button class="btn btn-default"  id="searchTitleBtn" type="button"><?= \Wskm::t('Search') ?></button>
					  </span>

					</div>
			</div>
			<div class="form-group">
				<label for="groupName"><?= \Wskm::t('Url')?></label>
				<input type="text" class="form-control" name="Block[url]" id="block-url" placeholder="http://" maxlength="255" >
			</div>
			<div class="form-group">
				<label for="groupName"><?= \Wskm::t('Sorting', 'admin')?></label>
				<input type="number" class="form-control" name="Block[sorting]" id="blockSorting" value="0" min="0" max="99" placeholder="" maxlength="20" >
			</div>
			<div class="form-group ">
				<label for="groupName"><?= \Wskm::t('Thumb')?></label>
				<div class="kv-avatar" style="width:200px">
					<?php echo Html::hiddenInput('Block[thumb]', '', ['id' => 'block-thumb'])	?>
					<input id="blockUpload" name="Uploads[file]" type="file" class="file-loading" >
				</div>
			</div>
		  
			<div class="form-group">
				<label for="groupName"><?= \Wskm::t('Summary') ?></label>
				<textarea class="form-control" name="Block[summary]" id="block-summary" rows="3"></textarea>
			</div>
			<?php echo Html::hiddenInput('Block[kind_id]', '', [ id => 'block-kindid' ])	?>
			<?php echo Html::hiddenInput('Block[content_id]', '', [ id => 'block-contentid' ])	?>
			<button type="submit" id="blockSubmit" class="btn btn-info"><?=\Wskm::t('Add')?></button>&nbsp;&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal"><?=\Wskm::t('Close')?></button>
		</form>
	  </div>

	</div>
  </div>
</div>

<script id="tplSearchRow" type="text/html" >
	<div class="list-group">
		{{each list v i}}
		<a href="javascript:;" onclick="searchSelect({{v.id}})"  style=" margin-bottom:0;border: none;border-bottom: 1px solid #ddd;padding: 0 10px;height: 34px;line-height: 34px;overflow: hidden;" class="list-group-item">{{v.title}}</a>
		{{/each}}
	</div>
	<button style="position: absolute;bottom: 0;right: 5px;" type="button" class="close" onclick="$('#block-title').popover('hide');"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
</script>

<script id="tplRowAdd" type="text/html" >
	{{each list v i}}
	<tr>
		<td  ><a href="{{v.url}}" target="_blank" >{{v.title}}</a></td>
		<td>{{v.sorting}}</td>
		<td >
			<a href="<?= \yii\helpers\Url::to(['block/view']) ?>&id={{v.id}}" target="_blank"  class="glyphicon glyphicon-eye-open "  title="<?= \Wskm::t('View', 'yii') ?>" ></a>&nbsp;
			<a href="<?= \yii\helpers\Url::to(['block/update']) ?>&id={{v.id}}" target="_blank" class="glyphicon glyphicon-pencil "  title="<?= \Wskm::t('Update', 'yii') ?>" ></a>&nbsp;
			<a href="javascript:;" onclick="blockDel(this, '{{v.id}}')" target="_blank" class="glyphicon glyphicon-trash c-red del" onclick="blockDel(this)" title="<?= \Wskm::t('Delete', 'yii') ?>" ></a>
		</td>
	 </tr>
	 {{/each}}
</script>
					
<script>	
	var stackedUrl = '<?= \yii\helpers\Url::to(['block/row']) ?>';	
	var curKindid = 0;
	function blockDel(obj, id){
		var tr = $(obj).parents('tr:first');
		confirmBox('<?=\Wskm::t('Are you sure you want to delete this item?', 'yii')?>', function(){

			$.post('<?= \yii\helpers\Url::to(['block/delete']) ?>',{ id : id}, function(data){
					//tip(data.error, 'stackedTable');
				tr.fadeOut(function(){ 
					tr.remove();
				});
			});
		});
		
	}

	function blockAdd() {
		$('#block-kindid').val(curKindid);
		$('#blockSorting').val(0);
		$('#blockUpload').fileinput('refresh').fileinput('enable');

		$('#blockAddModal').modal('show');
	}
		
	function stackedInit(){    
		$(".snav-stacked li[class!=sp]").click(function(){
			$(".snav-stacked li").removeClass("active");
			var obj = $(this);
			obj.addClass("active");
			
			$('#kind-key').html('key: ' + obj.attr('key'));
			
			stackedAjax(parseInt($(this).attr('upid')));
		});

		if(!$(".snav-stacked li").hasClass("active")){
			var firstEm = $(".snav-stacked li:first-child");
			if(!firstEm.hasClass("sp")){
				firstEm.click();
			}

		}
	}
	
	function stackedAjax(url, em, okFunc){ 
		var stackedFunc = function(msg){
			if (msg.error) {
				tip(msg.error, '#stackedTable');
			}
			
			var html = template('tplRowAdd', {
				list : msg
			});
			$('#stackedWrap').html(html);
			//initAttrRow();
		}
		
		$('#site-load').show();
		if(typeof em == 'undefined' || em == ""){
			em = "stackedWrap";
		}
		
		if(typeof okFunc != 'function'){
			okFunc = stackedFunc;
		}
				
		var gourl = '';
		if(typeof url == 'number'){
			curKindid = url;
			gourl = stackedUrl + '&kindid=' + url + "&z=" + Math.random();
		}else{
			gourl = url;
		}
		$.ajax({
			type : "GET",
			url: gourl,
			complete : function name(jqXHR, textStatus) {
				$('#site-load').hide();
			},
			success: stackedFunc

		});
	}
		
	function blockSubmitInit() {
		function showRequest(formData, jqForm, options) {
			console.log('Request');
			var title = $('#block-title');
			if (!title.val()){
				tip('<?= \Wskm::t('Can not be empty') ?>', '#block-title', 'bottom');
				title.focus();
				return false;
			}

			return true;
		}

		function showResponse(response, statusText, xhr, $form)  {
			console.log('Response');
			console.log(response, statusText, xhr);
			if (response.id) {
				$('#blockAddModal').modal('hide');
				stackedAjax(curKindid);
			}else if(response.error){
				$.each(response.error, function(k,v){
					$.each(v, function(kk,vv){
						tip(vv, '#blockSubmit');
					});
				});
				
			}
		}

		var options = {
			beforeSubmit:  showRequest,
			success:       showResponse,

			dataType:  'json',
			clearForm: true,
			resetForm: true,
			
			timeout:   3000
		};

		// bind form using 'ajaxForm'
		$('#formCreate').ajaxForm(options);
	}
	
	$(function(){
		stackedInit();
		
		$('#blockAddModal').on('shown.bs.modal', function () {
			$('#block-title').focus();
		});

		$('#blockAddModal').on('hidden.bs.modal', function () {
			$('#block-title').popover('hide');
			console.log('hide modal');
		});
		
		searchInit();
		
		blockSubmitInit();
	});
	
</script>

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
			defaultPreviewContent: '<img src="<?= \Wskm::getStaticUrl().'img/thumb-add.png' ?>" alt="" style="width:100px;cursor: pointer;">',
			layoutTemplates: {main2: '{preview}'},
			uploadExtraData : { 
				'<?= Yii::$app->request->csrfParam ?>' : '<?= Yii::$app->request->getCsrfToken() ?>',
				content_id : curContentid,
				preview : 1 
			},
			<?php if($model->thumb){ ?>
			layoutTemplates : {
				footer : '<div class="file-thumbnail-footer">\n' +
			'    {actions}\n' +
			'</div>'
			},
			<?php } ?>
			allowedFileExtensions: ["jpg", "png", "gif"]
		}).on('fileloaded', function(event, file, previewId, index, reader) {
			$('#blockUpload').fileinput('upload');
		}).on('fileuploaded', function(event, data, previewId, index) {
			var response = data.response; 
			if (response && response.initialPreviewConfig) {
				var imgurl = response.initialPreviewConfig[0].extra.img;
				var id = response.initialPreviewConfig[0].extra.id;
				$('#blcokThumb').val(imgurl);
			}
			
			console.log('fileuploaded');
		}).on('filedeleted', function(event, key, jqXHR, data) {
			console.log('filedeleted');
			$('#blcokThumb').val('');
		}).on('fileuploaderror', function(event, data, msg) {
			tip(msg, '.kv-avatar');
			$('#blockUpload').fileinput('refresh').fileinput('enable');
		 }).on('filedeleteerror', function(event, data, msg) {
			tip(msg, '.kv-avatar');
			$('#blcokThumb').val('');
			$('#blockUpload').fileinput('refresh').fileinput('enable');
		 });
			
	});
</script>
