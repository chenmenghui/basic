<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VcsTicket */

$this->title = 'Update Vcs Ticket: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vcs Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vcs-ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
