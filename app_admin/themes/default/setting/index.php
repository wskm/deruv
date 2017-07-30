<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Wskm::t('Setting', 'admin');
$this->params['breadcrumbs'][] = $this->title;
?>

<ul class="nav nav-tabs">
    <li role="presentation"  id="type-param" ><a href="<?= Url::to(['/setting', 'type' => 'param']) ?>"><?= Wskm::t('Param', 'admin') ?></a></li>
    <li role="presentation"  id="type-sys" ><a href="<?= Url::to(['/setting', 'type' => 'sys']) ?>"><?= Wskm::t('System', 'admin') ?></a></li>
    <li role="presentation"  id="type-email" ><a href="<?= Url::to(['/setting', 'type' => 'email']) ?>"><?= Wskm::t('Email') ?></a></li>
    <li role="presentation"  id="type-content" ><a href="<?= Url::to(['/setting', 'type' => 'content']) ?>"><?= Wskm::t('Content', 'admin') ?></a></li>
    <li role="presentation"  id="type-image" ><a href="<?= Url::to(['/setting', 'type' => 'image']) ?>"><?= Wskm::t('Image', 'admin') ?></a></li>
    <li role="presentation"  id="type-cache" ><a href="<?= Url::to(['/setting', 'type' => 'cache']) ?>"><?= Wskm::t('Cache', 'admin') ?></a></li>
</ul>
<script>
    var tabType = '<?= $type ?>';
    if (tabType == '') {
        tabType = 'sys';
    }

    $('#type-' + tabType).addClass('active');
</script>
<div class="col-sm-offset-1" style="margin-top:30px;" >

    <?php
    $form = ActiveForm::begin([
        'id' => 'form',
        'layout' => 'horizontal',
        'action' => Url::to(['setting/update']),
    ]);
    ?>
    <?= Html::hiddenInput('type', $type) ?>
    <div id="settingWrap" >
        <?php foreach ($settings as $index => $setting) { ?>
            <?php
            $field = $form->field($setting, "[$index]v");
            $field->inline = true;

            $noyes = [Wskm::t('No'), Wskm::t('Yes')];

            $out = $setting->out;
            $name = Wskm::t(ucfirst($setting->k), 'setting');

            $toList = [];
            if ($index == 'language') {

                $dirs = wskm\helpers\File::getDir(Yii::getAlias('@root').'/i18n');
                $langs = [];
                if ($dirs) {
                    $langs = array_combine(array_values($dirs), $dirs);
                } else {
                    $langs = [
                        'zh-CN' => 'zh-CN',
                        'en-US' => 'en-US',
                    ];
                }

                $toList = $langs;
            } else if ($index == 'timeZone') {
                $toList = \wskm\helpers\Timezone::getList();
            } else if ($index == 'frontendTheme') {
                $dirs = wskm\helpers\File::getDir(Yii::getAlias('@frontend').'/themes');
                if ($dirs) {
                    $toList = array_combine(array_values($dirs), $dirs);
                } else {
                    $out = '';
                }
            } else if ($index == 'adminLayout') {
                $toList = [
                    'main' => 'Main',
                    //'main_top' => 'Main Top',
                    'main_left' => 'Main Left',
                    //'main_right' => 'Main Right',
                ];
            }

            if ($out == 'radio') {
                echo $field->radioList($toList)->label($name);
            } elseif ($out == 'radio_noyes') {
                echo $field->radioList($noyes)->label($name);
            } elseif ($out == 'password') {
                echo $field->passwordInput()->label($name);
            } elseif ($out == 'checkbox') {
                echo $field->checkboxList($noyes)->label($name);
            } elseif ($out == 'select') {
                echo $field->dropDownList($toList)->label($name);
            } elseif ($out == 'select_noyes') {
                echo $field->dropDownList($noyes)->label($name);
            } else {
                echo $field->textInput(['maxlength' => true])->label($name);
            }
            ?>

        <?php } ?>

    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default"><?= Wskm::t('Submit') ?></button>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>


