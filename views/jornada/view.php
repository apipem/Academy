<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */

$this->title = $model->idJornada;
$this->params['breadcrumbs'][] = ['label' => 'Jornadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jornada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idJornada' => $model->idJornada], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idJornada' => $model->idJornada], [
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
            'idJornada',
            'nombre',
        ],
    ]) ?>

</div>
