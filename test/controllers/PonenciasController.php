<?php

namespace ricit\humhub\modules\test\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use ricit\humhub\modules\test\models\SearchP;
use ricit\humhub\modules\test\models\Ponencias;
use humhub\modules\user\components\BaseAccountController;

/**
 * PonenciasController implements the CRUD actions for Ponencias model.
 */
class PonenciasController extends BaseAccountController
{
    /**
    * @inheritdoc
    */
    public function init()
    {
        $this->appendPageTitle(Yii::t('TestModule.base', 'Articulos'));
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
     * Lists all Ponencias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $User_id = Yii::$app->user->getId();   
        $searchModel = new SearchP();
        $sublayout = 'default';

        if(Yii::$app->user->isAdmin() ){
            $dataProvider = $searchModel->searchAll($this->request->queryParams);
            $this->subLayout = '@test/views/layouts/' . $sublayout;
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
     * Displays a single Ponencias model.
     * @param int $Ponencia_id Ponencia ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Ponencia_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@test/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Ponencia_id),
        ]);
    }

    /**
     * Creates a new Ponencias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Ponencias();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Ponencia_id' => $model->Ponencia_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ponencias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Ponencia_id Ponencia ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Ponencia_id)
    {
        $model = $this->findModel($Ponencia_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Ponencia_id' => $model->Ponencia_id]);
        }

        else if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@test/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ponencias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Ponencia_id Ponencia ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Ponencia_id)
    {
        $this->findModel($Ponencia_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ponencias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Ponencia_id Ponencia ID
     * @return Ponencias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Ponencia_id)
    {
        if (($model = Ponencias::findOne(['Ponencia_id' => $Ponencia_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
