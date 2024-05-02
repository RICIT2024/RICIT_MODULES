<?php

namespace ricit\humhub\modules\test\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use ricit\humhub\modules\test\models\SearchA;
use ricit\humhub\modules\test\models\Articulos;
use humhub\modules\user\components\BaseAccountController;

/**
 * ArticulosController implements the CRUD actions for Articulos model.
 */
class ArticulosController extends BaseAccountController
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
     * Lists all Articulos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $User_id = Yii::$app->user->getId();
        $searchModel = new SearchA();
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
     * Displays a single Articulos model.
     * @param int $Articulos_id Articulos ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Articulos_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@test/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Articulos_id),
        ]);
    }

    /**
     * Creates a new Articulos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Articulos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Articulos_id' => $model->Articulos_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Articulos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Articulos_id Articulos ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Articulos_id)
    {
        $model = $this->findModel($Articulos_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Articulos_id' => $model->Articulos_id]);
        } 
        
        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@test/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Articulos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Articulos_id Articulos ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Articulos_id)
    {
        $this->findModel($Articulos_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Articulos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Articulos_id Articulos ID
     * @return Articulos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Articulos_id)
    {
        if (($model = Articulos::findOne(['Articulos_id' => $Articulos_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
