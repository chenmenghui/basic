<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VscRecord */

$this->title = 'Create Vsc Record';
$this->params['breadcrumbs'][] = ['label' => 'Vsc Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vsc-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
