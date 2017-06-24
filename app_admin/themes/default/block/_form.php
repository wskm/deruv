<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Block */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('js/edit.min.js');

?>
<script>
	var curContentid = '<?= $model->content_id ?>';
</script>
<?= $this->render('/common/_upload',[
	'model' => $model,
	'plan' => 2,
	'iscontent' => true,
]) ?>

<div class="block-form">
	<script>
		var curContentid = 0;
	</script>
	<script id="tplSearchRow" type="text/html" >
		<div class="list-group">
			{{each list v i}}
			<a href="javascript:;" onclick="searchSelect({{v.id}})"  style=" margin-bottom:0;border: none;border-bottom: 1px solid #ddd;padding: 0 10px;height: 34px;line-height: 34px;overflow: hidden;" class="list-group-item">{{v.title}}</a>
			{{/each}}
		</div>
		<button style="position: absolute;bottom: 0;right: 5px;" type="button" class="close" onclick="$('#block-title').popover('hide');"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</script>

    <?php $form = ActiveForm::begin([
		'layout' => 'horizontal',
		'fieldConfig' => [
			'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
			'horizontalCssClasses' => [
				'label' => 'col-sm-2',
				'offset' => 'col-sm-offset-2',
				'wrapper' => 'col-sm-9',
				'error' => '',
				'hint' => '',
			],
		],
	]); ?>

	<?php echo Html::hiddenInput('Block[content_id]', $model->content_id, ['id' => 'blcok-content_id'])	?>
	<?php // Html::hiddenInput('Block[kind_id]', $model->kind_id, ['id' => 'blcok-kind_id'])	?>
	<?= $form->field($model, 'kind_id')->dropDownList(service\BlockKind::getListOptions())->label(Wskm::t('BlockKind', 'admin'))	?>

    <?php // $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	<div class="form-group">
		<label class="control-label col-sm-2" ><?= \Wskm::t('Title')?></label>
		<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" value="<?= $model->title ?>" autocomplete="off"  name="Block[title]" id="block-title" placeholder="" maxlength="100" data-container="body" data-toggle="popover" data-trigger="manual" data-html="true" data-placement="bottom" data-content=""  >
					<span class="input-group-btn">
						<button class="btn btn-default"  id="searchTitleBtn" type="button"><?= \Wskm::t('Search') ?></button>
					</span>

				</div>
		</div>
    </div>
	
    <?= $form->field($model, 'url')->textInput(['maxlength' => true])->hint('http://www.demo.com') ?>

	<div class="form-group field-block-thumb required">
		<label class="control-label col-sm-2" ><?= \Wskm::t('Thumb')?></label>
		<div class="col-sm-9">
			<div class="kv-avatar" style="width:200px">
				<?php echo Html::hiddenInput('Block[thumb]', $model->thumb, ['id' => 'blcok-thumb'])	?>
				<input id="blockUpload" name="Uploads[file]" type="file" class="file-loading" >
			</div>
		</div>
	</div>
	
    <?= $form->field($model, 'sorting')->input('number', [ 'min' => 0, 'max' => 99])->label(\Wskm::t('Sorting', 'admin')) ?>
	
    <?= $form->field($model, 'summary')->textarea(['rows' => 3]) ?>

    <div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

	<script>
		$(function(){
			searchInit();
		});
	</script>
</div>