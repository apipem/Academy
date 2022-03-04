<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Observaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="observaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'funcionario_idfuncionarios')->textInput() ?>

    <?= $form->field($model, 'Estudiante_idestudiante')->textInput() ?>

    <?= $form->field($model, 'observacion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
