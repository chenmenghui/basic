<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VcsTicket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vcs-ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_time')->textInput(['readonly' => 'readonly']) ?>

    <?= $form->field($model, 'update_time')->textInput(['readonly' => 'readonly']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
