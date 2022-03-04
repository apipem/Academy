<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionario */

$this->title = 'Update Funcionario: ' . $model->idfuncionarios;
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idfuncionarios, 'url' => ['view', 'idfuncionarios' => $model->idfuncionarios]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="funcionario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
