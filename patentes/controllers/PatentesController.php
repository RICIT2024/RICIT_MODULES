<?php

namespace ricit\humhub\modules\patentes\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use ricit\humhub\modules\patentes\models\patentes;
use ricit\humhub\modules\patentes\models\SearchP;
use humhub\modules\user\components\BaseAccountController;

/**
 * PatentesController implements the CRUD actions for patentes model.
 */
class PatentesController extends BaseAccountController
{
    public function init()
    {
        $this->appendPageTitle(Yii::t('PatentesModule.base', 'Patentes'));
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
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all patentes models.
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
            $this->subLayout = '@patentes/views/layouts/' . $sublayout;
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
     * Displays a single patentes model.
     * @param int $Patentes_id Patentes ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Patentes_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@patentes/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Patentes_id),
        ]);
    }

    /**
     * Creates a new patentes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new patentes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Patentes_id' => $model->Patentes_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing patentes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Patentes_id Patentes ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Patentes_id)
    {
        $model = $this->findModel($Patentes_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Patentes_id' => $model->Patentes_id]);
        }
        
        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@patentes/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing patentes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Patentes_id Patentes ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Patentes_id)
    {
        $this->findModel($Patentes_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the patentes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Patentes_id Patentes ID
     * @return patentes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Patentes_id)
    {
        if (($model = patentes::findOne(['Patentes_id' => $Patentes_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
