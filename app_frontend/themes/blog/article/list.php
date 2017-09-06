<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;

$this->title = $category['name'];

/*
$parents = \service\Category::getParents($category['id']);
foreach($parents as $parentid){
	if ($parentid > 0) {
		$this->params['breadcrumbs'][] = ['label' => \service\Category::getInfoName($parentid), 'url' => ['/category', 'id' => $parentid ]];
	}
}
$this->params['breadcrumbs'][] = $this->title;
*/
?>
<link rel="stylesheet" href="<?= WEB_URL ?>themes/blog/css/index.css" type="text/css">

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
   'pagination' => $pages,
    'options' => ['class' => 'pagination pagination-sm'] 
]); ?>
</div>

<?php }else{ ?>
<?= Wskm::t('No results found.', 'yii') ?>
<?php } ?>
