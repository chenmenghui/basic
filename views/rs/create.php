<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rs */

$this->title = 'Create Rs';
$this->params['breadcrumbs'][] = ['label' => 'Rs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
