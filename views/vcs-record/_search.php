<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VcsRecordLogic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vcs-record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'revision') ?>

    <?= $form->field($model, 'rs') ?>

    <?= $form->field($model, 'ticket') ?>

    <?= $form->field($model, 'server') ?>

    <?php // echo $form->field($model, 'jenkins_status') ?>

    <?php // echo $form->field($model, 'next_revision') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'delete_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
