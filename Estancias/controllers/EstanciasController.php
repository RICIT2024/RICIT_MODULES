<?php

namespace ricit\humhub\modules\Estancias\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

use ricit\humhub\modules\Estancias\models\EstanciasInvestigacion;
use ricit\humhub\modules\Estancias\models\SearchEI;


use humhub\modules\user\components\BaseAccountController;
use yii\web\User;

/**
 * EstanciasController implements the CRUD actions for EstanciasInvestigacion model.
 */
class EstanciasController extends BaseAccountController
{
       /**
    * @inheritdoc
    */
    public function init()
    {
        $this->appendPageTitle(Yii::t('RecursosHumanosModule.base', 'Estancias'));
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
     * Lists all EstanciasInvestigacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $User_id = Yii::$app->user->getId();   
        $searchModel = new SearchEI();
        $sublayout = 'default';

        if(Yii::$app->user->isAdmin() ){
            $dataProvider = $searchModel->searchAll($this->request->queryParams);
            $this->subLayout = '@Estancias/views/layouts/' . $sublayout;
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
     * Displays a single EstanciasInvestigacion model.
     * @param int $Estancia_id Estancia ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Estancia_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@Estancias/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Estancia_id),
        ]);
    }

    /**
     * Creates a new EstanciasInvestigacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new EstanciasInvestigacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Estancia_id' => $model->Estancia_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EstanciasInvestigacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Estancia_id Estancia ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Estancia_id)
    {
        $model = $this->findModel($Estancia_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Estancia_id' => $model->Estancia_id]);
        }

        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@Estancias/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EstanciasInvestigacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Estancia_id Estancia ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Estancia_id)
    {
        $this->findModel($Estancia_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstanciasInvestigacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Estancia_id Estancia ID
     * @return EstanciasInvestigacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Estancia_id)
    {
        if (($model = EstanciasInvestigacion::findOne(['Estancia_id' => $Estancia_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
