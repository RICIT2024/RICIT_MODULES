<?php

namespace ricit\humhub\modules\cientificos\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use ricit\humhub\modules\cientificos\models\cientificos;
use ricit\humhub\modules\cientificos\models\SearchC;
use humhub\modules\user\components\BaseAccountController;
use yii\web\User;


/**
 * CientificosController implements the CRUD actions for cientificos model.
 */
class CientificosController extends BaseAccountController
{
    /**
    * @inheritdoc
    */
    public function init()
    {
        $this->appendPageTitle(Yii::t('CientificosModule.base', 'Eventos'));
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
     * Lists all cientificos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $User_id = Yii::$app->user->getId(); 
        $searchModel = new SearchC();
        $sublayout = 'default';

        if(Yii::$app->user->isAdmin() ){
            $dataProvider = $searchModel->searchAll($this->request->queryParams);
            $this->subLayout = '@cientificos/views/layouts/' . $sublayout;
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
     * Displays a single cientificos model.
     * @param int $Eventos_id Eventos ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Eventos_id)
    {

        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@cientificos/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Eventos_id),
        ]);
    }

    /**
     * Creates a new cientificos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new cientificos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Eventos_id' => $model->Eventos_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing cientificos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Eventos_id Eventos ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Eventos_id)
    {
        $model = $this->findModel($Eventos_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Eventos_id' => $model->Eventos_id]);
        }

        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@cientificos/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing cientificos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Eventos_id Eventos ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Eventos_id)
    {
        $this->findModel($Eventos_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the cientificos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Eventos_id Eventos ID
     * @return cientificos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Eventos_id)
    {
        if (($model = cientificos::findOne(['Eventos_id' => $Eventos_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
