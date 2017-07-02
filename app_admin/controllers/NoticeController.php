<?php

namespace admin\controllers;

use Yii;

class NoticeController extends CoreController
{

	public function load()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	}
	
	public function actionList()
	{
		$today = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
		$list = \admin\models\LogAction::find()->select([ 'id', 'title', 'level', 'created_at'])
				->where(['>', 'created_at', $today])
				->andWhere([ '>', 'level', 0 ])
				->asArray()->orderBy(['created_at' => SORT_DESC])
				->limit(20)->all();
		foreach($list as $k => $row){
			$list[$k]['ago'] = Yii::$app->formatter->asRelativeTime($row['created_at']);
		}
		
		return $list;
	}
}
