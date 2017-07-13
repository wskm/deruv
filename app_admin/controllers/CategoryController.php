<?php

namespace admin\controllers;

use Yii;
use common\models\Category;
use service\Category as CategoryService;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends CoreController
{

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

	public function load()
	{
		$this->assign('siteNav', 'Content');
	}

	/**
	 * Lists all Category models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$list = CategoryService::getListOptions(false);

		return $this->render('index', [
					'list' => $list
		]);
	}

	/**
	 * Displays a single Category model.
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
	 * Creates a new Category model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Category();
		$ok = $model->load(Yii::$app->request->post());

		if ($ok) {
			if ($model->parentid) {
				$upCateObj = \service\Category::getInfo($model->parentid);
				$model->level = $upCateObj ? $upCateObj['level'] + 1 : 0;
			} else {
				$model->level = 0;
			}
		}

		if ($ok && $model->save()) {
			CategoryService::setCache();
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			$model->status = 1;
			return $this->render('create', [
						'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Category model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		$ok = $model->load(Yii::$app->request->post());

		if ($ok) {
			if ($model->parentid) {
				$upCateObj = \service\Category::getInfo($model->parentid);
				$model->level = $upCateObj ? $upCateObj['level'] + 1 : 0;
			} else {
				$model->level = 0;
			}
		}

		if ($ok && $model->save()) {
			$childs = CategoryService::loadTree()->getTreeList($model->id);

			foreach ($childs as $child) {
				$ok = Yii::$app->db->createCommand()->update(Category::tableName(), ['level' => abs((int)$child['layer'] - 1)], 'id = :id', [
							':id' => $child['id']
						])
						->execute();
				if ($ok === false) {
					throw new NotFoundHttpException('The update id does not exist.');
				}
			}

			CategoryService::setCache();

			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
						'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Category model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		if (CategoryService::getChilds($id)) {
			throw new \yii\web\HttpException(500, 'There are subcategories.');
		}

		$count = \common\models\Content::find()
				->where(['category_id' => $id])
				->count();
		if ($count) {
			Yii::$app->session->addFlash('error', \Wskm::t('Has been used', 'admin'));
		} else {
			$this->findModel($id)->delete();
			CategoryService::setCache();
		}

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Category model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Category the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Category::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

}
