<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Observaciones */

$this->title = $model->idobservaciones;
$this->params['breadcrumbs'][] = ['label' => 'Observaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="observaciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idobservaciones' => $model->idobservaciones], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idobservaciones' => $model->idobservaciones], [
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
            'idobservaciones',
            'funcionario_idfuncionarios',
            'Estudiante_idestudiante',
            'observacion:ntext',
            'estado',
        ],
    ]) ?>

</div>
