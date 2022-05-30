<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Matricula */

$this->title = $model->idestudianteCurso;
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="matricula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idestudianteCurso' => $model->idestudianteCurso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idestudianteCurso' => $model->idestudianteCurso], [
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
            'idestudianteCurso',
            'estudiante',
            'curso',
            'complemento',
            'sede',
            'jornada',
        ],
    ]) ?>

</div>
