<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */

$this->title = $model->idestudiante;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estudiante-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idestudiante' => $model->idestudiante], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idestudiante' => $model->idestudiante], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idestudiante',
            [
                'attribute' => 'estudiante',
                'value' => function($model){
                    return $model->estudiante0->nombre.' '.$model->estudiante0->apellido;
                }
            ],
            [
                'attribute' => 'acudiente',
                'value' => function($model){
                    return $model->acudiente0->nombre.' '.$model->acudiente0->apellido;
                }
            ]
            ,
            [
                'attribute' => 'estado',
                'value' => function($model){
                    return $model->estado0->nombre;
                }
            ]
        ],
    ]) ?>

</div>
