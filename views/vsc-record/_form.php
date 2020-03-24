<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VscRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vsc-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'revision')->textInput() ?>

    <?= $form->field($model, 'rs')->textInput() ?>

    <?= $form->field($model, 'ticket')->textInput() ?>

    <?= $form->field($model, 'server')->textInput() ?>

    <?= $form->field($model, 'jenkins_status')->textInput() ?>

    <?= $form->field($model, 'next_id')->textInput() ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'delete_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
