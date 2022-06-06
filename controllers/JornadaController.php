<?php

namespace app\controllers;

use app\models\Jornada;
use app\models\JornadaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JornadaController implements the CRUD actions for Jornada model.
 */
class JornadaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Jornada models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JornadaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jornada model.
     * @param int $idJornada Id Jornada
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idJornada)
    {
        return $this->render('view', [
            'model' => $this->findModel($idJornada),
        ]);
    }

    /**
     * Creates a new Jornada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Jornada();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idJornada' => $model->idJornada]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Jornada model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idJornada Id Jornada
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idJornada)
    {
        $model = $this->findModel($idJornada);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idJornada' => $model->idJornada]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jornada model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idJornada Id Jornada
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idJornada)
    {
        $this->findModel($idJornada)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jornada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idJornada Id Jornada
     * @return Jornada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idJornada)
    {
        if (($model = Jornada::findOne(['idJornada' => $idJornada])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
