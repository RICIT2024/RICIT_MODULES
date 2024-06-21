<?php

namespace ricit\humhub\modules\premios\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\User;

use ricit\humhub\modules\premios\models\premios;
use ricit\humhub\modules\premios\models\SearchP;
use humhub\modules\user\components\BaseAccountController;




/**
 * PremiosController implements the CRUD actions for premios model.
 */
class PremiosController extends BaseAccountController
{

       /**
    * @inheritdoc
    */
    public function init()
    {
        $this->appendPageTitle(Yii::t('PremiosModule.base', 'Premios'));
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
     * Lists all premios models.
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
            $this->subLayout = '@premios/views/layouts/' . $sublayout;
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
     * Displays a single premios model.
     * @param int $Premios_id Premios ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Premios_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@premios/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Premios_id),
        ]);
    }

    /**
     * Creates a new premios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new premios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Premios_id' => $model->Premios_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing premios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Premios_id Premios ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Premios_id)
    {
        $model = $this->findModel($Premios_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Premios_id' => $model->Premios_id]);
        }

        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@premios/views/layouts/' . $sublayout;
        } 


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing premios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Premios_id Premios ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Premios_id)
    {
        $this->findModel($Premios_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the premios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Premios_id Premios ID
     * @return premios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Premios_id)
    {
        if (($model = premios::findOne(['Premios_id' => $Premios_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
