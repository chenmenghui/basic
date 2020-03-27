<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VcsPath */

$this->title = 'Create Vcs Path';
$this->params['breadcrumbs'][] = ['label' => 'Vcs Paths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vcs-path-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
