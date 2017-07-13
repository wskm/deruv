<?php

namespace frontend\controllers;

use Yii;
use yii\data\Pagination;
use common\models\Content;

class SearchController extends BaseController
{

	public function actionIndex($query)
	{
		$query = strip_tags(trim($query));
		$findQuery = Content::find()
				->where(['like', 'title', $query])
				->andWhere(['status' => Content::STATUS_PUBLISHED]);
		$countQuery = clone $findQuery;
		
		$pages = new Pagination(['totalCount' => $countQuery->count()]);
		if (\service\Setting::getParamConf('pageSize') > 0) {
			$pages->defaultPageSize = (int)\service\Setting::getParamConf('pageSize');
		}

		$models = $findQuery->offset($pages->offset)
						->limit($pages->limit)
						->asArray()->all();
		
		$this->assign('query', $query);
		return $this->render('/article/search', [
					'list' => $models,
					'pages' => $pages,
		]);
	}

}
