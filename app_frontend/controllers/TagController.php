<?php

namespace frontend\controllers;

use Yii;
use common\models\Tag;
use common\models\ContentTag;
use common\models\Content;
use yii\web\BadRequestHttpException;
use yii\db\Query;
use yii\data\Pagination;

class TagController extends BaseController
{

    public function actionIndex($name)
    {
        if (strlen($name) > 50) {
            throw new BadRequestHttpException('Bad Request!');
        }

        $model = Tag::findOne([
                'name' => $name
        ]);
        if (!$model || $model->status == Tag::STATUS_DISABLED) {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }

        $query = (new Query())->select('c.*')->from(ContentTag::tableName().' ct')
                ->leftJoin(Content::tableName().' c', 'ct.content_id = c.id')->where(['tag_id' => $model->id]);
        $countQuery = ContentTag::find()->where(['tag_id' => $model->id]);

        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        if (\service\Setting::getParamConf('pageSize') > 0) {
            $pages->defaultPageSize = (int)\service\Setting::getParamConf('pageSize');
        }

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('/tag/list', [
                'name' => $name,
                'list' => $models,
                'pages' => $pages,
        ]);
    }

}
