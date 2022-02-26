<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Test */
/* @var $form ActiveForm */
?>
<div class="site-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Name') ?>
        <?= $form->field($model, 'number') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-index -->
