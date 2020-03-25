<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VscRecord */

$this->title = 'Update Vsc Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vsc Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vsc-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>