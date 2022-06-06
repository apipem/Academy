<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */

$this->title = 'Update Estudiante: ' . $model->idestudiante;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestudiante, 'url' => ['view', 'idestudiante' => $model->idestudiante]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudiante-update">

    <h1>Modificar estudiante <?= $model->estudiante0->nombre.' '.$model->estudiante0->apellido ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
