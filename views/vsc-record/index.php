<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VscRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vsc Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vsc-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vsc Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'revision',
            'rs',
            'ticket',
            'server',
            //'jenkins_status',
            //'next_id',
            //'author',
            //'message:ntext',
            //'comment:ntext',
            //'create_time',
            //'update_time',
            //'delete_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
