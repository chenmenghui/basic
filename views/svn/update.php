<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Svn */

$this->title = 'Update Svn: ' . $model->comment ?: $model->id;
$this->title = strlen($this->title < 50 ?: substr($this->title, 0, 50) . '...');
$this->params['breadcrumbs'][] = ['label' => 'Svns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="svn-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
