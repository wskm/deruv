<?php

namespace frontend\controllers;

use Yii;
use yii\data\Pagination;
use common\models\Content;

class CategoryController extends BaseController
{

	public function actionIndex($id)
	{
		$id = (int)$id;
		$category = \service\Category::getInfo($id);
		if (!$category['status']) {
			throw new \yii\web\HttpException(500, \Wskm::t('This category has been disabled', 'frontend'));
		}

		$childIds = \service\Category::getChilds($id);
		$childIds[] = $id;

		$query = Content::find()
				->where(['in', 'category_id', $childIds])
				->andWhere([
			'status' => Content::STATUS_PUBLISHED
		]);
		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count()]);

		if (\service\Setting::getParamConf('pageSize') > 0) {
			$pages->defaultPageSize = (int)\service\Setting::getParamConf('pageSize');
		}

		$models = $query->offset($pages->offset)
						->limit($pages->limit)
						->asArray()->all();

		$tplList = $category['tpl_list'] ? $category['tpl_list'] : '/article/list';
		return $this->render($tplList, [
					'list' => $models,
					'pages' => $pages,
					'category' => $category,
		]);
	}

}
