<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Svn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="svn-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput() ?>

    <?= $form->field($model, 'server')->radioList([
        'dev'  => 'dev',
        'dev2' => 'dev2',
        'rc'   => 'rc',
        'live' => 'live',
    ]) ?>

    <?= $form->field($model, 'rs')->textInput() ?>

    <?= $form->field($model, 'patch')->textInput() ?>

    <?= $form->field($model, 'jenkins_status')->radioList([
        'committed' => 'Committed to SVN',
        'deployed'  => 'Deployed to server',
        'upgraded'  => 'Goto next step',
    ]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true, 'placeholder' => 'valenchen']) ?>

    <?= $form->field($model, 'add_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'delete_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
