<?php

namespace ricit\humhub\modules\certifi\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use ricit\humhub\modules\certifi\models\Certifi;
use ricit\humhub\modules\certifi\models\SearchCert;
use humhub\modules\user\components\BaseAccountController;
use yii\web\User;

/**
 * CertifiController implements the CRUD actions for certifi model.
 */
class CertifiController extends BaseAccountController
{
        /**
    * @inheritdoc
    */
    public function init()
    {
        $this->appendPageTitle(Yii::t('CertifiModule.base', 'Certifi'));
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
     * Lists all certifi models.
     *
     * @return string
     */
    public function actionIndex()
    {
       
        $User_id = Yii::$app->user->getId();   
        $searchModel = new SearchCert();
        $sublayout = 'default';

        if(Yii::$app->user->isAdmin() ){
            $dataProvider = $searchModel->searchAll($this->request->queryParams);
            $this->subLayout = '@certifi/views/layouts/' . $sublayout;
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
     * Displays a single certifi model.
     * @param int $Certificacion_id Certificacion ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Certificacion_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@certifi/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Certificacion_id),
        ]);
    }

    /**
     * Creates a new certifi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new certifi(); /**/

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Certificacion_id' => $model->Certificacion_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing certifi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Certificacion_id Certificacion ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Certificacion_id)
    {
        $model = $this->findModel($Certificacion_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Certificacion_id' => $model->Certificacion_id]);
        }

        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@certifi/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing certifi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Certificacion_id Certificacion ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Certificacion_id)
    {
        $this->findModel($Certificacion_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the certifi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Certificacion_id Certificacion ID
     * @return certifi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Certificacion_id)
    {
        if (($model = certifi::findOne(['Certificacion_id' => $Certificacion_id])) !== null) {
            return $model;
        }
 
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
