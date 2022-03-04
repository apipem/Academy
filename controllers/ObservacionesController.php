<?php

namespace app\controllers;

use app\models\Observaciones;
use app\models\ObservacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObservacionesController implements the CRUD actions for Observaciones model.
 */
class ObservacionesController extends Controller
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
     * Lists all Observaciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ObservacionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Observaciones model.
     * @param int $idobservaciones Idobservaciones
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idobservaciones)
    {
        return $this->render('view', [
            'model' => $this->findModel($idobservaciones),
        ]);
    }

    /**
     * Creates a new Observaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Observaciones();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idobservaciones' => $model->idobservaciones]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Observaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idobservaciones Idobservaciones
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idobservaciones)
    {
        $model = $this->findModel($idobservaciones);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idobservaciones' => $model->idobservaciones]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Observaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idobservaciones Idobservaciones
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idobservaciones)
    {
        $this->findModel($idobservaciones)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Observaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idobservaciones Idobservaciones
     * @return Observaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idobservaciones)
    {
        if (($model = Observaciones::findOne(['idobservaciones' => $idobservaciones])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
