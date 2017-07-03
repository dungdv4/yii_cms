<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PageHasFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-has-file-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
