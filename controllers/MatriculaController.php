<?php

namespace app\controllers;

use app\models\Matricula;
use app\models\MatriculaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MatriculaController implements the CRUD actions for Matricula model.
 */
class MatriculaController extends Controller
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
     * Lists all Matricula models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MatriculaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Matricula model.
     * @param int $idestudianteCurso Idestudiante Curso
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idestudianteCurso)
    {
        return $this->render('view', [
            'model' => $this->findModel($idestudianteCurso),
        ]);
    }

    /**
     * Creates a new Matricula model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Matricula();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idestudianteCurso' => $model->idestudianteCurso]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Matricula model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idestudianteCurso Idestudiante Curso
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idestudianteCurso)
    {
        $model = $this->findModel($idestudianteCurso);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idestudianteCurso' => $model->idestudianteCurso]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Matricula model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idestudianteCurso Idestudiante Curso
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idestudianteCurso)
    {
        $this->findModel($idestudianteCurso)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Matricula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idestudianteCurso Idestudiante Curso
     * @return Matricula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idestudianteCurso)
    {
        if (($model = Matricula::findOne(['idestudianteCurso' => $idestudianteCurso])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
