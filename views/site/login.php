<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login" style="height: 96vh;">
    <div class="d-flex mx-0">
        <div class="bg-white d-flex flex-column justify-content-center align-items-center" style="height: 100vh;width:428px;box-shadow: 0 4px 4px -2px rgb(0 0 0 / 30%);">
            <h1 class="text-center mb-4"><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-10 pl-3'],
                    'inputOptions' => ['class' => 'col-10 form-control'],
                    'errorOptions' => ['class' => 'col-10 invalid-feedback'],
                ],
                'options' => ['style' => 'width:367px;']
            ]); ?>
        
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        
                <?= $form->field($model, 'password')->passwordInput() ?>
        
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-12\">{error}</div>",
                ]) ?>
        
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-dark px-4', 'name' => 'login-button']) ?>
                </div>
        
            <?php ActiveForm::end(); ?>
            
        </div>
        <div class="col px-0" style="background-image: url('https://img.freepik.com/free-photo/back-school-background-with-school-supplies-copy-space_23-2148958977.jpg?w=2000');background-repeat:no-repeat;background-size:cover;">

        </div>
    </div>
</div>
