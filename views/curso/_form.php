<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'curso')->textInput() ?>

    <?= $form->field($model, 'cupos')->textInput() ?>

    <?= $form->field($model, 'jornada')->dropDownList([ 'mañana' => 'Mañana', 'tarde' => 'Tarde', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'año')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
