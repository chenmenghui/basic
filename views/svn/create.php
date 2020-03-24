<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Svn */

$this->title = 'Create Svn';
$this->params['breadcrumbs'][] = ['label' => 'Svns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="svn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
