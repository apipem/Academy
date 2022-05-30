<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MatriculaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matricula-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idestudianteCurso') ?>

    <?= $form->field($model, 'estudiante') ?>

    <?= $form->field($model, 'curso') ?>

    <?= $form->field($model, 'complemento') ?>

    <?= $form->field($model, 'sede') ?>

    <?php // echo $form->field($model, 'jornada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
