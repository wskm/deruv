<?php

namespace admin\controllers;

use Yii;
use admin\models\LogAction;
use admin\models\LogActionSearch;
use admin\controllers\CoreController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogActionController implements the CRUD actions for LogAction model.
 */
class LogActionController extends CoreController
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
		$this->assign('siteNav', 'Log');
	}
	
    /**
     * Lists all LogAction models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LogActionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LogAction model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (isset($_GET['isajax'])) {
			return $this->renderPartial('view', [
				'model' => $this->findModel($id),
				'isajax' => true,
			]);
		}
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing LogAction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

	public function actionDeleteExpired()
    {
		$day = (int)\Wskm::post('day');
		if ($day) {
			LogAction::deleteAll('created_at < :time ', [':time' => time() - $day*86400]);
		}

        return $this->redirect(['index']);
    }
	
    /**
     * Finds the LogAction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LogAction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LogAction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
