<?php

namespace wskm\web;

use Yii;

class Bower
{
	public static function getEditor($id, $args)
	{
		return self::getTinymce($id, $args);
	}
    
    public static function getTinymce($id, $args)
	{
		$args['csrf'] = [ 
			'name' => Yii::$app->request->csrfParam,
			'value' => Yii::$app->request->getCsrfToken(),
		];
		
		if (!isset($args['setupCallback'])) {
			$args['setupCallback'] = '';
		}
		
		$staticUrl = STATIC_URL;
		
		$script = <<<"AAA"
		<script src="{$staticUrl}bower/tinymce/tinymce.min.js"></script>
		<script src="{$staticUrl}bower/tinymce/langs/zh_CN.js"></script>
		<script>
		tinymce.init({
		  selector: '#{$id}',
		  theme: 'modern',
		  plugins: [
			'advlist autolink link image imagetools lists charmap print preview hr anchor pagebreak',
			'searchreplace wordcount code fullscreen insertdatetime media',
			'save table contextmenu directionality emoji template paste textcolor codesample'
		  ],
		  toolbar: 'code | insertfile undo redo | fontselect fontsizeselect | bold italic forecolor backcolor styleselect |  removeformat blockquote anchor |  pagebreak codesample | bullist numlist outdent indent | table emoji link image media upload | charmap print preview fullpage fullscreen ',
		  pagebreak_split_block: true,
		  
		  setup: function(editor) {
				{$args['setupCallback']}(editor);
		  },
		  
		  images_upload_url: '{$args['url']}',
		  images_upload_credentials: true,
		  images_reuse_filename: true,
		  automatic_uploads: true,
		  images_upload_handler: function (blobInfo, success, failure) {
			  var xhr, formData;
			  xhr = new XMLHttpRequest();
			  xhr.withCredentials = false;
			  xhr.open('POST', '{$args['url']}');

			  xhr.onload = function() {
				var json;

				if (xhr.status != 200) {
				  failure('HTTP Error: ' + xhr.status);
				  return;
				}

				json = JSON.parse(xhr.responseText);

				if (!json || typeof json.url != 'string') {
				  failure('Invalid JSON: ' + xhr.responseText);
				  return;
				}
				success(json.url);
			  };

			  formData = new FormData();
			  formData.append('{$args['name']}', blobInfo.blob(), blobInfo.filename());
			  formData.append('{$args['csrf']['name']}', '{$args['csrf']['value']}');

			  xhr.send(formData);
		  },
		  convert_urls :false,
		  menubar: false
		});
			  
	    function editorGet(){
			return tinymce.get('{$id}').getContent();
		}
			  
		function editorAdd(html){
			tinymce.get('{$id}').insertContent(html);
		}
		</script>
AAA;
		return $script;
	}
	
	public static function getUploadStatic()
	{
		$staticUrl = STATIC_URL;
		return <<< "AAA"
		<link href="{$staticUrl}bower/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
		<script src="{$staticUrl}bower/bootstrap-fileinput/js/fileinput.min.js" ></script>
		<script src="{$staticUrl}bower/bootstrap-fileinput/js/locales/zh.js" ></script>
		<style>
			.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover , .file-drop-zone, .file-drop-zone.clickable:hover{
				margin: 0;
				padding: 0;
				border: none;
				box-shadow: none;
				text-align: center;
			}
			.kv-avatar .file-input {
				display: table-cell;
				max-width: 180px;
			}
			.kv-reqd {
				color: red;
				font-family: monospace;
				font-weight: normal;
			}
			.file-preview-thumbnails{
				cursor: pointer;
			}
			.file-preview-image {
				max-width: 160px;
			}
		</style>
AAA;
		
	}

}