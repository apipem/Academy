<?php

namespace app\controllers;

use app\models\Sede;
use app\models\SedeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SedeController implements the CRUD actions for Sede model.
 */
class SedeController extends Controller
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
     * Lists all Sede models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SedeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sede model.
     * @param int $idSede Id Sede
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idSede)
    {
        return $this->render('view', [
            'model' => $this->findModel($idSede),
        ]);
    }

    /**
     * Creates a new Sede model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Sede();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idSede' => $model->idSede]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sede model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idSede Id Sede
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idSede)
    {
        $model = $this->findModel($idSede);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSede' => $model->idSede]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sede model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idSede Id Sede
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idSede)
    {
        $this->findModel($idSede)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sede model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idSede Id Sede
     * @return Sede the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSede)
    {
        if (($model = Sede::findOne(['idSede' => $idSede])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
