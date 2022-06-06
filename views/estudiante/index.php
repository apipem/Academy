<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstudianteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Estudiante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            ,
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, app\models\Estudiante $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idestudiante' => $model->idestudiante]);
                 }
            ],
        ],
    ]); ?>


</div>
