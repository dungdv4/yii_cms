<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PageHasFile */

$this->title = 'Create Page Has File';
$this->params['breadcrumbs'][] = ['label' => 'Page Has Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-has-file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
