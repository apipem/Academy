<?php

namespace app\controllers;

use app\models\Curso;
use app\models\CursoSearch;
use app\models\Estudiante;
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
        $p->idPersona = "";
        $p->nombre = $_GET["n1"];
        $p->apellido = $_GET["a1"];
        $p->documento = $_GET["documento"];
        $p->celular = $_GET["ce"];
        $p->correo = $_GET["co"];
        $p->fechaNacimiento = $_GET["fn"];
        $p->direccion = $_GET["direccion"];
        $p->ciudad = $_GET["direccion"];
        $p->foto = "no tiene";
        $p->contrasena = $_GET["ce"];
        $p->genero = $_GET["genero"];
        $p->TipoDocumento = $_GET["td"];
        $p->save();

        $pa = $p;
        $pa->idPersona = "";
        $pa->nombre = $_GET["n2"];
        $pa->apellido = $_GET["a2"];
        $pa->save();

        $e = new Estudiante();
        $e->estudiante = $p->idPersona;
        $e->acudiente = $pa->idPersona;
        $e->estado = 2;
        $e->save();

        $matricula = new
    }


}
