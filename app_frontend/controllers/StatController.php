<?php

namespace frontend\controllers;

use Yii;
use common\models\Content;
use common\models\StatDay;

class StatController extends BaseController
{

	public function load()
	{
		//\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	}

	public function actionIndex()
	{
		$today = date('Y-m-d');
		$ok = false;
		
		$model = StatDay::findOne($today);
		if (!$model) {
			$model = new StatDay();
			$model->day = $today;
			$model->pv = 1;
			$ok = $model->save();
		}else{
			$ok = $model->updateCounters(['pv' => 1]);
		}
		
		return $ok ? 1 : 0;
	}

	public function actionContent($id)
	{
		$id = (int)$id;
		if ($id < 1) {
			return;
		}
		$model = Content::findOne($id);
		$model->updateCounters(['pv' => 1]);
		return $model->pv;
	}

}
