<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Svn */

$this->title = 'Update Svn: ' . $model->comment ?: $model->id;
$this->title = strlen($this->title < 50 ?: substr($this->title, 0, 50) . '...');
$this->params['breadcrumbs'][] = ['label' => 'Svns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="svn-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method'  => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'code',
            'server',
            'rs',
            'patch',
            'jenkins_status',
            'comment:ntext',
            'author',
            'add_time',
            'update_time',
            'delete_time',
        ],
    ]) ?>

</div>
