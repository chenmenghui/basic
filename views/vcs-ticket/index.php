<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VcsTicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vcs Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vcs-ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vcs Ticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'code',
            'remark:ntext',
            // 'create_time',
            // 'update_time',
            //'delete_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
