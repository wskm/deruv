<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Wskm::t('Categorie', 'admin');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="panel panel-default a-uno">
        <div class="panel-body">
        <?= Html::a(Wskm::t('Create', 'admin'), ['create'], ['class' => 'glyphicon glyphicon-plus-sign c-tomato']) ?>
        </div>
    </div>
    
    <ul class="list-group a-uno category-list" >
		<?php foreach($list as $k => $v ){ ?>
        <li class="list-group-item"><span id="name1"  ><?= $v?></span>
            <a href="<?= Url::to(['/category/delete', 'id' => $k]) ?>" class="glyphicon glyphicon-remove c-red pull-right del" data-confirm="Are you sure you want to delete this item?" data-method="post" style="margin-left:12px;" title="删除" ></a>
            <a href="<?= Url::to(['/category/update', 'id' => $k]) ?>" class="glyphicon glyphicon glyphicon-pencil pull-right edit"  style="margin-left:12px;" title="编辑"></a>
            <a href="<?= Url::to(['/category/view', 'id' => $k]) ?>" class="glyphicon glyphicon-eye-open pull-right "  ></a>
        </li>
		<?php } ?>

    </ul>
    <script>
    function initRowBg(){
        var rowClass = [ 'success', 'info', 'warning', 'danger'  ];
        var j = 0;

        $('.category-list li').each(function(i){
            if(j >3) j = 0;

            $(this).attr('class', 'list-group-item list-group-item-' + rowClass[j]);
            j++;
        });
    }
    //initRowBg();
    </script>
