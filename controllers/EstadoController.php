<?php

namespace app\controllers;

use app\models\Estado;
use app\models\EstadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstadoController implements the CRUD actions for Estado model.
 */
class EstadoController extends Controller
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
     * Lists all Estado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EstadoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estado model.
     * @param int $idEstado Id Estado
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idEstado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idEstado),
        ]);
    }

    /**
     * Creates a new Estado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Estado();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idEstado' => $model->idEstado]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Estado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idEstado Id Estado
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idEstado)
    {
        $model = $this->findModel($idEstado);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEstado' => $model->idEstado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Estado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idEstado Id Estado
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idEstado)
    {
        $this->findModel($idEstado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idEstado Id Estado
     * @return Estado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEstado)
    {
        if (($model = Estado::findOne(['idEstado' => $idEstado])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
