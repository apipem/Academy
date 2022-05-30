<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Matricula */

$this->title = 'Update Matricula: ' . $model->idestudianteCurso;
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestudianteCurso, 'url' => ['view', 'idestudianteCurso' => $model->idestudianteCurso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matricula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
