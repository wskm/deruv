<?php

namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

use common\models\Content;
use common\models\Article;

class UserController extends BaseController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = $this->user;
        $ok = $model->load(Yii::$app->request->post());
        if ($model->newPassword && !$model->currentPassword) {
            $model->addError('currentPassword', \Wskm::t('{attribute} cannot be blank.', 'yii', [
                'attribute' => \Wskm::t('Current Password', 'user'),
            ]));

            $ok = false;
        }

        if ($ok) {
            $ok = $model->save();
            if ($ok) {
                Yii::$app->session->addFlash('success', \Wskm::t('Successful operation'));
                return $this->refresh();
            }
        }

        return $this->render('profile', [
            'model' => $model
        ]);
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

        return $this->render('contributes', [
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
    
    public function actionContributeUpdate($id)
    {
        $model = Content::findOne([
            'id' => $id,
        ]);
        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        if ($model->user_id != $this->user->id) {
            throw new ServerErrorHttpException('You are not allowed to perform this action.');
        }
        
        $modelArticle = $model->article;

        if ($model->load(Yii::$app->request->post()) && $modelArticle->load(Yii::$app->request->post())) {

            $model->updated_at = time();
            $modelArticle->updated_at = $model->updated_at;

            $isValid = $model->validate();
            $isValid = $modelArticle->validate() && $isValid;
            if ($isValid) {

                $model->save(false);

                $modelArticle->detail = \yii\helpers\HtmlPurifier::process($modelArticle->detail);
                $modelArticle->save(false);

                return $this->redirect(['contributes']);
            }
        }

        return $this->render('contribute', [
            'model' => $model,
            'article' => $modelArticle,
        ]);
    }
    
    public function actionDelete($id)
    {
        $id = (int)$id;
        $model = Content::findOne([
            'id' => $id,
        ]);
        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        if ($model->user_id != $this->user->id) {
            throw new ServerErrorHttpException('You are not allowed to perform this action.');
        }
        
        $files = \common\models\Files::find()->select(['id'])->where([
					'content_id' => $id
				])->all();
		foreach ($files as $file) {

			$ok = \service\Files::del($file->id);
			if (isset($ok['error'])) {
				Yii::$app->session->addFlash('error', $ok['error']);
			}
		}

		$ok = \common\models\Article::findOne([
					'content_id' => $id
				])->delete();

		if ($ok !== false) {
			$model->delete();
		}

		return $this->redirect(['contributes']);
        
    }

}
