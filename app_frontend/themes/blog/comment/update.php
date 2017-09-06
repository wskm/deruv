<?php

use service\Block;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = \Wskm::t('Update').':'.\Wskm::t('Comment');

?>
<link rel="stylesheet" href="<?= WEB_URL ?>themes/blog/css/view.css" type="text/css">

<h2 style="margin: 10px 0 25px 0;"><a href="<?= \Wskm::url(['/article', 'id' => $modelContent->id ]) ?>"  ><?= $modelContent->title ?></a></h2>
		
<?= $this->render('/common/comment_form', [
        'content_id' => $modelContent->id,
        'comment' => $model
    ]) ?>
