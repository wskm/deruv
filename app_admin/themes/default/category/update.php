<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model admin\models\Category */

$this->title = Wskm::t('Update') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Wskm::t('Categorie', 'admin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Wskm::t('Update');
?>
<div class="category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
