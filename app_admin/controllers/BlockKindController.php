<?php

namespace admin\controllers;

use Yii;
use common\models\BlockKind;
use yii\data\ActiveDataProvider;
use admin\controllers\CoreController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlockKindController implements the CRUD actions for BlockKind model.
 */
class BlockKindController extends CoreController
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
	
	public function load()
	{
		$this->assign('siteNav', 'Block');
	}
	
    /**
     * Lists all BlockKind models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => BlockKind::find(),
			'sort' => [
				'defaultOrder' => [
					'sorting' => SORT_DESC,            
				]
			], 
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlockKind model.
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
     * Creates a new BlockKind model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BlockKind();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BlockKind model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BlockKind model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$count = \common\models\Block::find()
			->where(['kind_id' => $id])
			->count();
		if ($count) {
			Yii::$app->session->addFlash('error', \Wskm::t('Has been used', 'admin'));
		}else{
			$this->findModel($id)->delete();
		}

        return $this->redirect(['index']);
    }

    /**
     * Finds the BlockKind model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BlockKind the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlockKind::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
