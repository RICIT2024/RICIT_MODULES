<?php

namespace ricit\humhub\modules\RecursosHumanos\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\User;
use ricit\humhub\modules\RecursosHumanos\models\SearchD;
use humhub\modules\user\components\BaseAccountController;
use ricit\humhub\modules\RecursosHumanos\models\Docencia;

/**
 * DocenciaController implements the CRUD actions for Docencia model.
 */
class DocenciaController extends BaseAccountController
{
    public function init()
    {
        $this->appendPageTitle(Yii::t('RecursosHumanosModule.base', 'Docencia'));
        return parent::init();
    }
    
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Docencia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $User_id = Yii::$app->user->getId();   
        $searchModel = new SearchD();
        $sublayout = 'default';

        if(Yii::$app->user->isAdmin() ){
            $dataProvider = $searchModel->searchAll($this->request->queryParams);
            $this->subLayout = '@RecursosHumanos/views/layouts/' . $sublayout;
        } 
        
        else {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $User_id);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Docencia model.
     * @param int $Docencia_id Docencia ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Docencia_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@RecursosHumanos/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Docencia_id),
        ]);
    }

    /**
     * Creates a new Docencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Docencia();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Docencia_id' => $model->Docencia_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Docencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Docencia_id Docencia ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Docencia_id)
    {
        $model = $this->findModel($Docencia_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Docencia_id' => $model->Docencia_id]);
        }

        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@RecursosHumanos/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Docencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Docencia_id Docencia ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Docencia_id)
    {
        $this->findModel($Docencia_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Docencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Docencia_id Docencia ID
     * @return Docencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Docencia_id)
    {
        if (($model = Docencia::findOne(['Docencia_id' => $Docencia_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
