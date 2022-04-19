<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDocumento */

$this->title = $model->idTipo_Documento;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipo-documento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTipo_Documento' => $model->idTipo_Documento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTipo_Documento' => $model->idTipo_Documento], [
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
            'idTipo_Documento',
            'tipo',
        ],
    ]) ?>

</div>
