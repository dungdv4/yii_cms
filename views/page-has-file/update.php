<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PageHasFile */

$this->title = 'Update Page Has File: ' . $model->page_id;
$this->params['breadcrumbs'][] = ['label' => 'Page Has Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->page_id, 'url' => ['view', 'page_id' => $model->page_id, 'file_id' => $model->file_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-has-file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
