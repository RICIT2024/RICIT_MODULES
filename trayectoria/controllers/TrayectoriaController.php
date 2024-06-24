<?php

namespace ricit\humhub\modules\trayectoria\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\User;
use humhub\modules\user\components\BaseAccountController;
use ricit\humhub\modules\trayectoria\models\trayectoria;
use ricit\humhub\modules\trayectoria\models\SearchT;

/**
 * TrayectoriaController implements the CRUD actions for trayectoria model.
 */
class TrayectoriaController extends BaseAccountController
{
    public function init()
    {
        $this->appendPageTitle(Yii::t('TrayectoriaModule.base', 'Experiencia Laboral'));
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
     * Lists all trayectoria models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $User_id = Yii::$app->user->getId();   
        $searchModel = new SearchT();
        $sublayout = 'default';

        if(Yii::$app->user->isAdmin() ){
            $dataProvider = $searchModel->searchAll($this->request->queryParams);
            $this->subLayout = '@trayectoria/views/layouts/' . $sublayout;
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
     * Displays a single trayectoria model.
     * @param int $Trayectoria_id Trayectoria ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Trayectoria_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@trayectoria/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Trayectoria_id),
        ]);
    }

    /**
     * Creates a new trayectoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new trayectoria();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Trayectoria_id' => $model->Trayectoria_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing trayectoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Trayectoria_id Trayectoria ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Trayectoria_id)
    {
        $model = $this->findModel($Trayectoria_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Trayectoria_id' => $model->Trayectoria_id]);
        }

        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@trayectoria/views/layouts/' . $sublayout;
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing trayectoria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Trayectoria_id Trayectoria ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Trayectoria_id)
    {
        $this->findModel($Trayectoria_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the trayectoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Trayectoria_id Trayectoria ID
     * @return trayectoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Trayectoria_id)
    {
        if (($model = trayectoria::findOne(['Trayectoria_id' => $Trayectoria_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
