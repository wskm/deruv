<?php

use yii\helpers\Html;
use service\Content;
use yii\widgets\LinkPager;

$this->title = \Wskm::t('Home');

$page = Wskm::get('page', 1);
$data = Content::getListByPage($page);
$list = $data['list'];

?>
<link rel="stylesheet" href="./themes/blog/css/index.css" type="text/css">

<?php if($list) { ?>
<ul>
    <?php foreach($list as $row){ ?>
    <li>
        <h2><a href="<?= Wskm::url(['article', 'id' => $row['id']]) ?>"><?= $row['title'] ?></a></h2>
        <div class="summary">
        <?= Yii::$app->formatter->asText($row['summary']) ?>
        </div>
        <div class="meta" >
        <?= Wskm::t('View') ?>&nbsp;<?= $row['pv'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= Yii::$app->formatter->asRelativeTime($row['updated_at']) ?>
        </div>
    </li>
    <?php } ?>
</ul>

<div class="page-wrap">
<?php echo LinkPager::widget([
    'pagination' => $data['pages'],
    'options' => ['class' => 'pagination pagination-sm'] 
]); ?>
</div>

<?php }else{ ?>
<?= Wskm::t('No results found.', 'yii') ?>
<?php } ?>
