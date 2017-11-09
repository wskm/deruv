<?php

namespace frontend\controllers;

use Yii;
use common\models\Content;

class ArticleController extends BaseController
{

    public function actionIndex($id)
    {
        $model = $this->findModel((int)$id);
        $category = \service\Category::getInfo($model->category_id);
        if (!$category['status']) {
            throw new \yii\web\HttpException(500, \Wskm::t('This category has been disabled', 'frontend'));
        }

        if ($model->status == 0) {
            throw new \yii\web\HttpException(500, \Wskm::t('This article has been closed', 'frontend'));
        } else if ($model->status == 2) {
            throw new \yii\web\HttpException(500, \Wskm::t('This article needs to be audited', 'frontend'));
        }
        
        if ($model->tag) {
            $model->tag = explode(',', $model->tag);
        }else{
            $model->tag = [];
        }
        
        $tplShow = $category->tpl_show ? $category->tpl_show : 'show';
        return $this->render($tplShow, [
                'model' => $model,
                'category' => $category,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        } else {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }
    }

}
