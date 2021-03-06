<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VcsRecord */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vcs Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vcs-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'revision',
            'rs',
            'ticket',
            'server',
            'jenkins_status',
            'next_revision',
            'author',
            'message:ntext',
            'remark:ntext',
            'create_time',
            'update_time',
            'delete_time',
        ],
    ]) ?>

</div>
