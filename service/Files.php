<?php

namespace service;

use common\models\Files as FilesModel;

class Files
{
	
	public static function del($id, $url = '')
	{
		if (!$id && !$url) {
			return [
				'error' => 'Request exception.',
			];
		}
		
		$model = null;
		if ($id) {
			$model = FilesModel::findOne($id);
		}else if ($url){
			$url = ltrim($url, \Wskm::getUploadUrl());
			$model = FilesModel::find()->where([
				'url' => $url
			])->one();
		}
		
		if (!$model) {
			return [
				'error' => 'The requested file does not exist.',
			];
		}
		
		$ok = $model->delete();
		if (!$ok) {
			return [
				'error' => 'Model delete error!',
			];
		}
		
		$fileFull = \Wskm::getUploadPath().$model->url;
		if (file_exists($fileFull)) {
			$ok = unlink($fileFull);
		} else {
			return [
				'error' => 'File does not exist!',
			];
		}

		if ($ok === false) {
			return [
				'error' => error_get_last()['message'],
			];
		}

		return [];
	}

}
