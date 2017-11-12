<?php

namespace frontend\controllers;

use Yii;
use Wskm;
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
            throw new \yii\web\HttpException(500, Wskm::t('This article has been closed', 'frontend'));
        }

        if (!$modelContent->iscomment) {
            throw new \yii\web\HttpException(500, Wskm::t('Do not allow comments', 'frontend'));
        }

        $query = Comment::find()->where([
            'content_id' => $modelContent->id,
            'parent_id' => 0,
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
            'modelContent' => $modelContent,
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
            throw new \yii\web\HttpException(500, Wskm::t('Comments are closed.', 'frontend'));
        }

        if (!$this->isLogin()) {
            \yii\helpers\Url::remember(['/article', 'id' => $content_id]);
            return $this->redirect(['site/login']);
        }

        if (!Yii::$app->session->has('comment.lasttime')) {
            Wskm::session('comment.lasttime', time());
        } else {
            $lasttime = Wskm::session('comment.lasttime');
            if (time() - $lasttime < 10) {
                Yii::$app->session->addFlash('error', Wskm::t('Comments are too frequent.', 'frontend'));
                //return $this->redirect(['index', 'id' => $content_id]);
                return $this->goReferer();
            }

            Wskm::session('comment.lasttime', time());
        }

        $modelContent = Content::findOne($content_id);
        if (!$modelContent) {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }

        $msg = trim(Wskm::post('msg'));
        if (!$msg) {
            Yii::$app->session->addFlash('error', Wskm::t('{attribute} cannot be blank.', 'yii', [
                'attribute' => Wskm::t('Comment'),
            ]));
            return $this->goReferer();
        }

        if (Wskm::getUser(false)) {
            $now = time();
            $commentCount = Comment::find()
            ->where([
                'user_id' => Wskm::getUser()->id,
            ])->andWhere([
                'between', 'created_at', $now - 43200, $now
            ])->count();

            $userCommentMax = (int)\service\Setting::getConf('content', 'userCommentMax');
            if (!$userCommentMax) {
                $userCommentMax = 300;
            }

            if ($commentCount >= $userCommentMax) {
                Yii::$app->session->addFlash('error', Wskm::t('You commented too much today.', 'frontend'));
                return $this->goReferer();
            }
        }
        
        $parent_id = (int)Wskm::post('parent_id');
        //$reply_id = (int)Wskm::post('reply_id');
        //$reply_name = Wskm::post('reply_name');
        
        $comment = new Comment();
        $comment->content_id = $content_id;
        $comment->parent_id = $parent_id;
        $comment->user_id = Wskm::getUser(false) ? Wskm::getUser()->id : 0;
        $comment->user_name = Wskm::getUser(false) ? Wskm::getUser()->username : '';
        $comment->avatar = Wskm::getUser(false) ? Wskm::getUser()->avatar : '';
        $comment->ip = Yii::$app->request->userIP;
        $comment->status = \service\Setting::getConf('content', 'auditComment') ? Comment::STATUS_AUDIT : Comment::STATUS_OPEN;
        $comment->msg = \yii\helpers\HtmlPurifier::process(nl2br($msg));
        $ok = $comment->save();
        if (!$ok) {
            Yii::error('Comment create error:'.var_export($comment->errors, true));
            Yii::$app->session->addFlash('error', Wskm::t('Comments failed!', 'frontend'));
        } else {
            if ($parent_id) {
                $parentComment = Comment::findOne([
                    'id' => $parent_id
                ]);
                $parentComment && $parentComment->updateCounters(['reply' => 1]);
            }else{
                $modelContent->updateCounters(['comment' => 1]);
            }
        }

        if ($comment->status == Comment::STATUS_AUDIT) {
            Yii::$app->session->addFlash('success', Wskm::t('Comments need to be audited.', 'frontend'));
        }

        return $this->redirect(['index', 'id' => $content_id]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->user_id != $this->user->id) {
            return $this->asJson([
                'error' => Wskm::t('You are not allowed to perform this action.', 'yii'),
            ]);
        }

        $contentObj = Content::findOne($model->content_id);
        if (!$contentObj) {
            return $this->asJson([
                'error' => 'Not content.',
            ]);
        }
        
        Comment::deleteAll([
            'parent_id' => $model->id
        ]);
        
        $ok = $model->delete();
        if ($ok === false) {
            return $this->asJson([
                'error' => 'Delete Error.',
            ]);
        }
        
        if ($model->parent_id > 0) {
            $parentComment = Comment::findOne([
                'id' => $model->parent_id
            ]);
            $parentComment && $parentComment->updateCounters(['reply' => -1]);
        }else{        
            $contentObj->updateCounters(['comment' => -1]);
        }

        return $this->asJson([
            'msg' => 'ok',
        ]);
    }

    public function actionUpdate($id)
    {
        if (!$this->isLogin()) {
            return $this->redirect(['site/login']);
        }

        $commentObj = $this->findModel($id);
        
        if ($commentObj->user_id != $this->user->id) {
            throw new ServerErrorHttpException('You are not allowed to perform this action.');
        }
        
        $contentObj = Content::findOne($commentObj->content_id);
        if (!$contentObj) {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }

        if (Yii::$app->request->isPost) {
            $msg = trim(Wskm::post('msg'));
            if (!$msg) {
                Yii::$app->session->addFlash('error', Wskm::t('{attribute} cannot be blank.', 'yii', [
                    'attribute' => Wskm::t('Comment'),
                ]));
                return $this->redirect(['update', 'id' => $commentObj->id]);
            }

            $commentObj->msg = \yii\helpers\HtmlPurifier::process(nl2br($msg));
            $ok = $commentObj->save();
            if ($ok) {
                Yii::$app->session->addFlash('success', Wskm::t('Comments Success.', 'frontend'));
                return $this->redirect(['update', 'id' => $commentObj->id]);
            } else {
                Yii::$app->session->addFlash('error', Wskm::t('Comments failed!', 'frontend'));
            }
        }
        $commentObj->msg = str_replace(["\n", "\r\n", "\r"], '', $commentObj->msg);
        $commentObj->msg = str_replace(["<br />", "<br>", "<br/>"], "\r", $commentObj->msg);
        return $this->render('update', [
            'model' => $commentObj,
            'modelContent' => $contentObj,
        ]);
    }
    
    public function actionChildren($id, $p = 1)
    {
        $id = (int)$id;
        $p = (int)$p;
        if (!$id || !$p) {
            throw new ServerErrorHttpException(Wskm::t('Missing required parameters: {params}', 'frontend' , [
                'params' => 'id And p'
            ]));
        }
        
        $pageSize = 15;
        $data = [];
        foreach (Comment::find()->where([
            'parent_id' => $id,
            'status' => Comment::STATUS_OPEN,
        ])->offset( ($p - 1)*$pageSize )->limit($pageSize)
          ->orderBy([ 'id' => SORT_DESC ])->each(15) as $comment) {
            $data[] = [
                'id' => $comment['id'],
                'parent_id' => $comment['parent_id'],
                'user_id' => $comment['user_id'],
                'user_name' => $comment['user_name'],
                'user_url' => \Wskm::url(['/user/show', 'id' => $comment['user_id']]),
                'msg' => $comment['msg'],
                'isdelete' => $this->user->id == $comment['user_id'],
                'created_at' => Yii::$app->formatter->asRelativeTime($comment['created_at']),
            ];
        }
        
        $this->asJson($data);
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
