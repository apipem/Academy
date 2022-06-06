<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'estudiante')->textInput() ?>



    <div class="form-group field-estudiante-estado required">
        <label class="control-label" for="estudiante-estado">Estado</label>
        <br>
        <select name="Estudiante[acudiente]" id="estudiante-acudiente" class="form-select form-select-sm">
            <?php
            foreach (\app\models\Persona::find()->all() as $a ){
                ?>
                <option value="<?=$a->idPersona?>"><?=$a->nombre.' '.$a->apellido?></option>
                <?php
            }
            ?>
        </select>
        <div class="help-block"></div>
    </div>


    <div class="form-group field-estudiante-estado required">
        <label class="control-label" for="estudiante-estado">Estado</label>
        <br>
        <select name="Estudiante[estado]" id="estudiante-estado" class="form-select form-select-sm">
            <?php
            foreach (\app\models\Estado::find()->all() as $a ){
                ?>
                <option value="<?=$a->idEstado?>"><?=$a->nombre?></option>
                <?php
            }
            ?>
        </select>
        <div class="help-block"></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
