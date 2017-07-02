<?php

namespace frontend\controllers;

use Yii;
use yii\data\Pagination;
use common\models\Comment;
use common\models\Content;

class CommentController extends BaseController
{
	public $enableCsrfValidation = false;

	public function actionIndex($id)
	{
		$modelContent = Content::findOne((int)$id);
		if (!$modelContent) {
			throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
		}

		if (!$modelContent->status) {
			throw new \yii\web\HttpException(500, \Wskm::t('This article has been closed', 'frontend'));
		}

		if (!$modelContent->iscomment) {
			throw new \yii\web\HttpException(500, \Wskm::t('Do not allow comments', 'frontend'));
		}

		$query = Comment::find()->where([
			'content_id' => $modelContent->id,
			'status' => Comment::STATUS_OPEN,
		]);

		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count()]);

		if (\service\Setting::getParamConf('pageSize') > 0) {
			$pages->defaultPageSize = (int)\service\Setting::getParamConf('pageSize');
		}

		$comments = $query->offset($pages->offset)
						->limit($pages->limit)
						->orderBy(['created_at' => SORT_DESC])
						->asArray()->all();

		return $this->render('index', [
					'modelConent' => $modelContent,
					'pages' => $pages,
					'comments' => $comments,
		]);
	}

	public function actionCreate($id)
	{
		$content_id = (int)$id;
		if (!$content_id) {
			throw new \yii\web\HttpException(400);
		}
		
		if (\service\Setting::getConf('content', 'closeComment')) {
			throw new \yii\web\HttpException(500, \Wskm::t('Comments are closed.', 'frontend'));
		}
		
		if (!$this->isLogin()) {
			\yii\helpers\Url::remember(['/article', 'id' => $content_id]);
			return $this->redirect(['site/login']);
		}

		$modelContent = Content::findOne($content_id);
		if (!$modelContent) {
			throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
		}
		
		$msg = trim(\Wskm::post('msg'));
		if (!$msg) {
			Yii::$app->session->addFlash('error', \Wskm::t('{attribute} cannot be blank.', 'yii',[
				'attribute' => \Wskm::t('Comment'),
			]));
			return $this->redirect(['index', 'id' => $content_id]);
		}
		
		if (\Wskm::getUser(false)) {
			$now = time();
			$commentCount = Comment::find()
				->where([
					'user_id' => \Wskm::getUser()->id,
				])->andWhere([
					'between', 'created_at', $now - 43200, $now
				])->count();
			
			$userCommentMax = (int)\service\Setting::getConf('content', 'userCommentMax');
			if (!$userCommentMax) {
				$userCommentMax = 500;
			}
			
			if ($commentCount >= $userCommentMax) {
				Yii::$app->session->addFlash('error', \Wskm::t('You commented too much today.', 'frontend'));
				return $this->redirect(['index', 'id' => $content_id]);
			}
		}

		$comment = new Comment();
		$comment->content_id = $content_id;
		$comment->user_id = \Wskm::getUser(false) ? \Wskm::getUser()->id : 0;
		$comment->user_name = \Wskm::getUser(false) ? \Wskm::getUser()->username : '';
		$comment->avatar = \Wskm::getUser(false) ? \Wskm::getUser()->avatar : '';
		$comment->ip = Yii::$app->request->userIP;
		$comment->status = \service\Setting::getConf('content', 'auditComment') ? Comment::STATUS_AUDIT : Comment::STATUS_OPEN;
		$comment->msg = \yii\helpers\HtmlPurifier::process(nl2br($msg));
		$ok = $comment->save();
		if (!$ok) {
			Yii::error('Comment create error:'.var_export($comment->errors, true));
			Yii::$app->session->addFlash('error', \Wskm::t('Comments failed!', 'frontend'));
		}else{
			$modelContent->updateCounters(['comment' => 1]);
		}
		
		if ($comment->status == Comment::STATUS_AUDIT) {
			Yii::$app->session->addFlash('success', \Wskm::t('Comments need to be audited.', 'frontend'));
		}
		
		return $this->redirect(['index', 'id' => $content_id]);
	}

	protected function findModel($id)
	{
		if (($model = Comment::findOne($id)) !== null) {
			return $model;
		} else {
			throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
		}
	}

}
