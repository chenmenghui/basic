<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VcsPath */

$this->title = 'Update Vcs Path: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vcs Paths', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vcs-path-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
