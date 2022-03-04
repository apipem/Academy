<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Observaciones */

$this->title = 'Update Observaciones: ' . $model->idobservaciones;
$this->params['breadcrumbs'][] = ['label' => 'Observaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idobservaciones, 'url' => ['view', 'idobservaciones' => $model->idobservaciones]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="observaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
