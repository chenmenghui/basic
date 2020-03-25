<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VcsRs */

$this->title = 'Create Vcs Rs';
$this->params['breadcrumbs'][] = ['label' => 'Vcs Rs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vcs-rs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
