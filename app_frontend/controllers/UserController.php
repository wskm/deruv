<?php
namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\Content;
use common\models\Article;

class UserController extends BaseController
{
	public function actionIndex()
    {
		return $this->render('profile');
    }
	
	public function actionContributes()
    {
		$dataProvider = new ActiveDataProvider([
            'query' => Content::find()->where([
				'user_id' => $this->getUser()->id,
			]),
			'sort' => [
				'defaultOrder' => [
					'created_at' => SORT_DESC,            
				]
			], 
        ]);
		
		return $this->render('index', [
					'dataProvider' => $dataProvider,
		]);
    }
	
	public function actionContribute()
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
				$model->status = \service\Setting::getConf('content', 'userPublishedAudit') ? 2 : 1;

				$model->save(false);

				$modelArticle->content_id = $model->id;
				$modelArticle->detail = \yii\helpers\HtmlPurifier::process($modelArticle->detail);

				$modelArticle->save(false);

				return $this->redirect(['contributes']);
			}
		}
	
		$model->iscomment = 1;
		return $this->render('contribute', [
					'model' => $model,
					'article' => $modelArticle,
		]);
    }
	
}
