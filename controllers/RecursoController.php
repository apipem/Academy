<?php

namespace app\controllers;

use app\models\Curso;
use app\models\CursoSearch;
use app\models\Genero;
use app\models\Jornada;
use app\models\Persona;
use app\models\Sede;
use app\models\TipoDocumento;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\Yii;

/**
 * CursoController implements the CRUD actions for Curso model.
 */
class RecursoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return ['access' => [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['cursos', 'jornadas', 'sedes','persona','genero','td'],
                    'allow' => true,
                    'roles' => ['?'],
                ],
            ],],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionSedes(){return Json::encode(Sede::find()->all());}

    public function actionCursos(){return Json::encode(Curso::find()->all());}

    public function actionJornadas(){return Json::encode(Jornada::find()->all());}

    public function actionGenero(){return Json::encode(Genero::find()->all());}

    public function actionTd(){return Json::encode(TipoDocumento::find()->all());}

    public function actionPersona()
    {
        $p = new Persona();
        $p->nombre = $_GET["n1"];
        $p->apellido = $_GET["n1"];
        $p->fechaNacimiento = $_GET["n1"];
        $p->celular = $_GET["n1"];
        $p->correo = $_GET["n1"];
        return $_GET["n1"];
    }


}
