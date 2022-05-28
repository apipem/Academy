<?php

namespace app\controllers;

use app\models\Curso;
use app\models\CursoSearch;
use app\models\Jornada;
use app\models\Sede;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
                    'actions' => ['cursos', 'jornadas', 'sedes'],
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

    public function actionSedes()
    {
        return Json::encode(Sede::find()->all());
    }

    public function actionCursos()
    {
        return Json::encode(Curso::find()->all());
    }

    public function actionJornadas()
    {
        return Json::encode(Jornada::find()->all());
    }


}
