<?php

namespace admin\controllers;

use Yii;
use common\models\Block;
use \common\models\BlockKind;
use admin\controllers\CoreController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlockController implements the CRUD actions for Block model.
 */
class BlockController extends CoreController
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
     * Lists all Block models.
     * @return mixed
     */
    public function actionIndex()
    {
		
        return $this->render('index', [
			'kinds' => BlockKind::find()->orderBy(['sorting' => SORT_DESC])->asArray()->all(),
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }

	public function actionRow($kindid)
    {
		$kindid = (int)$kindid;
		$list = Block::find()->where([
			'user_id' => \Wskm::getUser()->id,
			'kind_id' => $kindid,
		])->orderBy(['sorting' => SORT_DESC])->asArray()->all();
		
		$this->asJson($list);
	}
	
    /**
     * Displays a single Block model.
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
     * Creates a new Block model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Block();
		$model->user_id = $this->getUser()['id'];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
			$this->asJson([
				'id' => $model->id
			]);
        } else {
			$this->asJson([
				'error' => $model->errors
			]);
			
            /*
			 return $this->render('create', [
                'model' => $model,
            ]);
			 */
        }
    }

    /**
     * Updates an existing Block model.
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
     * Deletes an existing Block model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
		$id = (int)\Wskm::post('id');
		if (!$id ) {
			$id = (int)\Wskm::get('id');
		}
        $model = $this->findModel($id);
		
		$ok = \service\Files::del('', $model->thumb);
		if (isset($ok['error'])) {
			Yii::error('Block delete file error : '.$ok['error']);
		}
		
		$model->delete();
		
		if (!Yii::$app->request->isAjax) {
			return $this->redirect(['index']);
		}
        
    }

    /**
     * Finds the Block model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Block the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Block::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
