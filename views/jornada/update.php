<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */

$this->title = 'Update Jornada: ' . $model->idJornada;
$this->params['breadcrumbs'][] = ['label' => 'Jornadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idJornada, 'url' => ['view', 'idJornada' => $model->idJornada]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jornada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
