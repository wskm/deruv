<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = Wskm::t('Update Cache', 'admin');
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="min-height:400px;width:500px;margin-top:50px;" class="container-fluid" >
		<div class="checkbox">
			<label>
				<input type="checkbox" value="category" id="update-category" class="caches" > <?= Wskm::t('Category', 'admin') ?>
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="block-kind" id="update-block-kind" class="caches" > <?= Wskm::t('BlockKind', 'admin') ?>
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="block" id="update-block" class="caches" > <?= Wskm::t('Block', 'admin') ?>
			</label>
		</div>
		
		<div class="checkbox">
			<label>
				<input type="checkbox" value="setting" id="update-setting" class="caches" > <?= Wskm::t('Setting', 'admin') ?>
			</label>
		</div>
        <div class="checkbox">
			<label>
				<input type="checkbox"  value="content" disabled='true' id="update-content" class="caches  " > <del><?= Wskm::t('Content', 'admin') ?></del>
			</label>
		</div>
    	<div class="alert alert-warning " role="alert"><?= Wskm::t('The system will automatically update the cache, generally do not need to manually update.', 'setting')?></div>

        <button type="button" id="updateBtn" onclick="updataCache()" class="btn btn-default"><?= Wskm::t('Update') ?></button>
</div>

<script>
function updataCache() {    
    var cacheTypes = $('.caches:checked');
    if (!cacheTypes.length) {
        tip('<?= Wskm::t('Please select') ?>', '#updateBtn');     
        return;
    }
    $.each(cacheTypes, function(i,obj){
        var type = $(obj).val();
        if (!type) {
            return;
        }
        loadShow();
        updateUrl('index.php?r=' + type + '/set-cache', type);
    });
}

function updateUrl(url, type) {    
    $.getJSON(url, function(data){
        tip(data.msg, '#update-' + type, 'bottom');     
        loadHide();
    }).error(function(a, b, msg){
        tip(msg, '#update-' + type, 'bottom');    
        loadHide();
    });
}
</script>