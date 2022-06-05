<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ObservacionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="observaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idobservaciones') ?>

    <?= $form->field($model, 'funcionario_idfuncionarios') ?>

    <?= $form->field($model, 'Estudiante_idestudiante') ?>

    <?= $form->field($model, 'observacion') ?>

    <?= $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
