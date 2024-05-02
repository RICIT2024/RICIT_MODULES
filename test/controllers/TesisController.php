<?php

namespace ricit\humhub\modules\test\controllers;

use Yii;
use yii\filters\VerbFilter;

use yii\web\NotFoundHttpException;
use ricit\humhub\modules\test\models\Tesis;
use ricit\humhub\modules\test\models\SearchT;
use humhub\modules\user\components\BaseAccountController;

/**
 * TesisController implements the CRUD actions for Tesis model.
 */
class TesisController extends BaseAccountController
{
    /**
     * @inheritdoc
     */
     public function init()
     {
         $this->appendPageTitle(Yii::t('TestModule.base', 'Recursos Humanos'));
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
     * Lists all Tesis models.
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
     * Displays a single Tesis model.
     * @param int $Tesis_id Tesis ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Tesis_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@test/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Tesis_id),
        ]);
    }

    /**
     * Creates a new Tesis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tesis();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Tesis_id' => $model->Tesis_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tesis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Tesis_id Tesis ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Tesis_id)
    {
        $model = $this->findModel($Tesis_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Tesis_id' => $model->Tesis_id]);
        }

        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@test/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tesis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Tesis_id Tesis ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Tesis_id)
    {
        $this->findModel($Tesis_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tesis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Tesis_id Tesis ID
     * @return Tesis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Tesis_id)
    {
        if (($model = Tesis::findOne(['Tesis_id' => $Tesis_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function userview($id)
    {
        $Tesis_id = $id;
        $model = Tesis::findOne($Tesis_id);

        if (!$model) {
            throw new \yii\web\NotFoundHttpException('La tesis no existe.');
        }

        return $this->render('userview', [
            'model' => $model,
        ]);
    }
}
