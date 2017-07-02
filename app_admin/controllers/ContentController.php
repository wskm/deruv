<?php

namespace admin\controllers;

use Yii;
use common\models\Content;
use common\models\ContentSearch;
use common\models\Article;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends CoreController
{

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all Content models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new ContentSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Content model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
					'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Content model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Content();
		$modelArticle = new Article();

		if ($model->load(Yii::$app->request->post()) && $modelArticle->load(Yii::$app->request->post())) {
			$model->user_id = $this->user->id;
			$model->user_name = $this->user->username;

			$model->updated_at = time();
			$modelArticle->updated_at = $model->updated_at;

			$isValid = $model->validate();
			$isValid = $modelArticle->validate() && $isValid;
			if ($isValid) {
				$model->save(false);

				$modelArticle->content_id = $model->id;
				$modelArticle->detail = \yii\helpers\HtmlPurifier::process($modelArticle->detail, [
							'Attr.AllowedFrameTargets' => ['_blank']
				]);

				$modelArticle->save(false);

				$this->updateFile('fids', $model->id);

				return $this->redirect(['view', 'id' => $model->id]);
			}
		}

		$model->status = 1;
		$model->iscomment = 1;
		return $this->render('create', [
					'model' => $model,
					'modelArticle' => $modelArticle,
		]);
	}

	/**
	 * Updates an existing Content model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		$modelArticle = Article::find()->where(['content_id' => $id])->one();

		$post = Yii::$app->request->post();
		if (isset($post['Content']['updated_at'])) {
			$post['Content']['updated_at'] = strtotime($post['Content']['updated_at']);
		}

		if ($model->load($post) && $modelArticle->load($post)) {
			$modelArticle->updated_at = $model->updated_at;

			$isValid = $model->validate();
			$isValid = $modelArticle->validate() && $isValid;
			if ($isValid) {

				$modelArticle->detail = \yii\helpers\HtmlPurifier::process($modelArticle->detail, [
							'Attr.AllowedFrameTargets' => ['_blank']
				]);
				
				$model->save(false);
				$modelArticle->save(false);

				$this->updateFile('fids', $model->id);

				return $this->redirect(['view', 'id' => $model->id]);
			}
		}

		//$model->updated_at = time();
		return $this->render('update', [
					'model' => $model,
					'modelArticle' => $modelArticle,
		]);
	}

	private function updateFile($name, $content_id)
	{
		$fids = (array) \Wskm::post($name);
		$fids = array_filter($fids, is_numeric);
		$fids = array_unique($fids);
		if (!$fids) {
			return true;
		}

		return \common\models\Files::updateAll(['content_id' => $content_id], ['in', 'id', $fids]);
	}

	/**
	 * Deletes an existing Content model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$id = (int) $id;
		$files = \common\models\Files::find()->select(['id'])->where([
					'content_id' => $id
				])->all();
		foreach ($files as $file) {

			$ok = \service\Files::del($file->id);
			if (isset($ok['error'])) {
				Yii::$app->session->addFlash('error', $ok['error']);
			}
		}

		$ok = \common\models\Article::findOne([
					'content_id' => $id
				])->delete();

		if ($ok !== false) {
			$this->findModel($id)->delete();
		}


		return $this->redirect(['index']);
	}

	public function actionSearch($q)
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		$data = Content::find()->select(['id', 'title', 'thumb', 'summary'])->where([
					'status' => 1,
				])->andFilterWhere(['like', 'title', $q])->asArray()->limit(10)->all();
		foreach ($data as $k => $v) {
			$data[$k]['url'] = \Wskm::url(['article', 'id' => $v['id']]);
		}

		return $data;
	}

	/**
	 * Finds the Content model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Content the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Content::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

}
