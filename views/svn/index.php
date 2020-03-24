<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SvnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Svns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="svn-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Svn', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'code',
            'server',
            'rs',
            'patch',
            'jenkins_status',
            'comment:ntext',
            //'author',
            //'add_time',
            //'update_time',
            //'delete_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
