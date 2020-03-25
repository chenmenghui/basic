<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VcsRecord */

$this->title = 'Create Vcs Record';
$this->params['breadcrumbs'][] = ['label' => 'Vcs Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vcs-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
