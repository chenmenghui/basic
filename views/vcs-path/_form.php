<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VcsPath */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vcs-path-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'revision')->textInput() ?>

    <? //= $form->field($model, 'action')->textInput() ?>
    <?= $form->field($model, 'action')->radioList([
        '0' => 'Added',
        '1' => 'Deleted',
        '2' => 'Modified',
    ]) ?>
    <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

    <? //= $form->field($model, 'create_time')->textInput() ?>
    <!---->
    <? //= $form->field($model, 'update_time')->textInput() ?>
    <!---->
    <? //= $form->field($model, 'delete_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
