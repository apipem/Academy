<?php

namespace app\controllers;

use app\models\TipoDocumento;
use app\models\TipoDocumentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoDocumentoController implements the CRUD actions for TipoDocumento model.
 */
class TipoDocumentoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TipoDocumento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TipoDocumentoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoDocumento model.
     * @param int $idTipo_Documento Id Tipo Documento
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTipo_Documento)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTipo_Documento),
        ]);
    }

    /**
     * Creates a new TipoDocumento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TipoDocumento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idTipo_Documento' => $model->idTipo_Documento]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoDocumento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTipo_Documento Id Tipo Documento
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTipo_Documento)
    {
        $model = $this->findModel($idTipo_Documento);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTipo_Documento' => $model->idTipo_Documento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TipoDocumento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTipo_Documento Id Tipo Documento
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTipo_Documento)
    {
        $this->findModel($idTipo_Documento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TipoDocumento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTipo_Documento Id Tipo Documento
     * @return TipoDocumento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTipo_Documento)
    {
        if (($model = TipoDocumento::findOne(['idTipo_Documento' => $idTipo_Documento])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
