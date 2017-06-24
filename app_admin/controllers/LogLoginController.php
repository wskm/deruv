<?php

namespace admin\controllers;

use Yii;
use admin\models\LogLogin;
use admin\models\LogLoginSearch;
use admin\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogLoginController implements the CRUD actions for LogLogin model.
 */
class LogLoginController extends AdminController
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
     * Lists all LogLogin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LogLoginSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LogLogin model.
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
     * Deletes an existing LogLogin model.
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
			LogLogin::deleteAll('login_time < :time ', [':time' => time() - $day*86400]);
		}

        return $this->redirect(['index']);
    }

    /**
     * Finds the LogLogin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LogLogin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LogLogin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
