<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PageHasFile */

$this->title = $model->page_id;
$this->params['breadcrumbs'][] = ['label' => 'Page Has Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-has-file-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'page_id' => $model->page_id, 'file_id' => $model->file_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'page_id' => $model->page_id, 'file_id' => $model->file_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'page_id',
            'file_id',
        ],
    ]) ?>

</div>
