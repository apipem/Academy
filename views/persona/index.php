<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPersona',
            'nombre',
            'apellido',
            'tipoDocumento',
            'documento',
            //'celular',
            //'correo:ntext',
            //'fechaNacimiento',
            //'rh',
            //'genero',
            //'direccion:ntext',
            //'ciudad',
            //'foto:ntext',
            //'contrasena:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Persona $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idPersona' => $model->idPersona]);
                 }
            ],
        ],
    ]); ?>


</div>
