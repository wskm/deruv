<?php

namespace common\controllers;

//use yii\base\Action;
use Yii;
use yii\web\Controller;
use common\models\Files;

class UploadController extends Controller
{
	
	public function beforeAction($action)
    {
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
				
        return parent::beforeAction($action);
    }
	
	public function actionDel()
	{
		$id = \Wskm::post('id');
		$url = \Wskm::post('url');
		return \service\Files::del($id, $url);
	}

	public function actionFile()
	{
		if (!Yii::$app->user->identity->id) {
			return [
				'error' => \Wskm::t('Login Required'),
			];
		}
		
		if (!Yii::$app->request->isPost || !$_FILES) {
			throw new \yii\web\HttpException(400);
		}

		$model = new \common\models\Uploads();
		$model->file = \yii\web\UploadedFile::getInstance($model, 'file');
		if (!$model->file) {
			return [
				'error' => 'File does not exist!',
			];
		}
		
		$isedit = isset($_GET['edit']);
		$imgInfo = [];
		if (substr($model->file->type, 0, 5) == 'image') {
			$imgInfo = \wskm\Validator::UploadImage($model->file->tempName);
			if (!$imgInfo) {
				return [
					'error' => Yii::t('yii', 'The file "{file}" is not an image.', [ 'file' => $model->file->name]),
				];
			}
		}
		
		$fileName = '';
		if ($isedit) {
			$fileName = $model->file->baseName.'.'.$model->file->extension;
		}else{
			$fileName = md5($model->file->baseName.time()).'.'.$model->file->extension;
		}
		
		$preDir = date('y_m_d');
		
		$dirPath = \Wskm::getUploadPath().$preDir;
		if (!is_dir($dirPath)) {
			\yii\helpers\FileHelper::createDirectory($dirPath);
		}
		
		$savePath = $dirPath.DIRECTORY_SEPARATOR.$fileName;
		$ok = $model->upload($savePath);
		if ($model->errors && is_array($model->errors)) {
			return [
				'error' => current($model->errors),
			];
		}

		if (!$ok) {
			return [
				'error' => error_get_last()['message'],
			];
		}
		
		if ((int)\Wskm::post('plan', 0) === 1) {
			$thumbHeight = (int)\service\Setting::getConf('image', 'avatarHeight');
			$thumbWidth = (int)\service\Setting::getConf('image', 'avatarWidth');
			$thumbHeight = $thumbHeight ? $thumbHeight : 100;
			$thumbWidth = $thumbWidth ? $thumbWidth : 100;
			$ok = \wskm\Image::thumbnail($savePath, $savePath, $thumbWidth, $thumbHeight, 
					\service\Setting::getConf('image', 'quality') ? (int)\service\Setting::getConf('image', 'quality') : 50);
			if ($ok === false) {
				Yii::error('Upload Avatar thumb error:'.$savePath);
			}
		}

		$modelFile = null;
		if ($isedit) {
			$modelFile = Files::find()->where([
				'url' => $preDir.'/'.$fileName
			])->one();
		}
		if (!$modelFile) {
			$modelFile = new Files();
		}
		
		$modelFile->name = $model->file->baseName.'.'.$model->file->extension;
		$modelFile->ext = $model->file->extension;
		$modelFile->size = $model->file->size;
		$modelFile->url = $preDir.'/'.$fileName;

		$modelFile->user_id = Yii::$app->user->identity->id;
		$modelFile->content_id = (int)\Wskm::post('content_id');
		$modelFile->category_id = (int)\Wskm::post('category_id');
		$modelFile->plan = (int)\Wskm::post('plan', 0);
		
		$modelFile->width = 0;
		$modelFile->height = 0;
		
		$mimes = [];
		if ($imgInfo && isset($imgInfo['mime'])) {
			$modelFile->width = $imgInfo[0];
			$modelFile->height = $imgInfo[1];

			$mimes = explode('/', $imgInfo['mime']);
		} else {
			$mimes = explode('/', $model->file->type);
		}
		$modelFile->type = isset($mimes[0]) ? $mimes[0] : 'other';
		$ok = $modelFile->save();

		if ($ok === false) {
			return [
				'error' => 'files save error!',
			];
		}
		
		$uploadUrl = \Wskm::getUploadUrl();
		if (!isset($_POST['preview'])) {
			return [
				'id' => $modelFile->id,
				'name' => $modelFile->name,
				'url' => $uploadUrl.$modelFile->url,
				'type' => $modelFile->type,
				'width' => $modelFile->width,
			];
		}

		return $data = [
			'initialPreview' => [
				"<img src='".$uploadUrl.$modelFile['url']."' class='file-preview-image kv-preview-data' style='width:160px' alt='{$modelFile['name']}'   title='{$modelFile['name']}'>",
			],
			'initialPreviewConfig' => [
				[
					'type' => "image",
					'caption' => $modelFile['name'],
					'width' => '160px',
					'size' => $modelFile['size'],
					'url' => \yii\helpers\Url::to(['upload/del']),
					//'key'=> 99, 
					'extra' => [
						'img' => $uploadUrl.$modelFile->url,
						'id' => $modelFile->id,
					]
				],
			],
		];
	}
	
	public function actionContent()
	{
		$content_id = (int)\Wskm::get('content_id');
		
		$list = Files::find()->where([
			'user_id' => Yii::$app->user->identity->id,
			'content_id' => $content_id,
		]);
		
		$query = new \yii\db\Query();
		$query->select(['id', 'name', 'type', 'url', 'width'])->from(Files::tableName());
		$query->where([
			'user_id' => \Wskm::getUser()->id,
			'plan' => 0
		]);
		if ($content_id) {
			//$query->andWhere(['content_id' => $content_id ])->orWhere(['content_id' => 0 ]);
			$query->andWhere(['OR', ['content_id' => $content_id ], ['content_id' => 0 ] ]);
		}else{
			$query->andWhere(['content_id' => 0 ]);
		}
		$list = $query->limit(20)->all();
		
		return $this->renderPartial('content', [
			'list' => $list,
		]);
	}

}
