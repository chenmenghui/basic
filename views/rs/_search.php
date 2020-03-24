<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'rs') ?>

    <?= $form->field($model, 'comment') ?>

    <?= $form->field($model, 'add_time') ?>

    <?= $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'delete_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
