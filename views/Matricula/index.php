<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MatriculaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Matriculas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Matricula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idestudianteCurso',
            'estudiante',
            'curso',
            'complemento',
            'sede',
            //'jornada',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Matricula $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idestudianteCurso' => $model->idestudianteCurso]);
                 }
            ],
        ],
    ]); ?>


</div>
