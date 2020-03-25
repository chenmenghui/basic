<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VcsTicket */

$this->title = 'Create Vcs Ticket';
$this->params['breadcrumbs'][] = ['label' => 'Vcs Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vcs-ticket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
