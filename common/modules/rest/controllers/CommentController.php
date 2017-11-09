<?php

namespace common\modules\rest\controllers;

use Yii;
use wskm\rest\ActiveController;

class CommentController extends ActiveController
{
    public $modelClass = 'common\models\Comment';
}
