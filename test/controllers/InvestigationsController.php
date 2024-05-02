<?php

namespace ricit\humhub\modules\test\controllers;

use Yii;
use ricit\humhub\modules\test\models\Libros;
use ricit\humhub\modules\test\models\SearchSP;

use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use humhub\modules\user\components\BaseAccountController;


/**
 * InvestigationsController implements the CRUD actions for Libros model.
 */
class InvestigationsController extends BaseAccountController
{
       /**
     * @inheritdoc
     */
    public function init()
    {
        $this->appendPageTitle(Yii::t('TestModule.base', 'Libros'));
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
     * Lists all Libros models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $User_id = Yii::$app->user->getId();   
        $searchModel = new SearchSP();
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
     * Displays a single Libros model.
     * @param int $Libro_id Libro ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Libro_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@test/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Libro_id),
        ]);
    }

    /**
     * Creates a new Libros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Libros();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Libro_id' => $model->Libro_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    

    /**
     * Updates an existing Libros model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Libro_id Libro ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Libro_id)
    {
        $model = $this->findModel($Libro_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Libro_id' => $model->Libro_id]);
        }
        
        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@test/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Libros model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Libro_id Libro ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeletea($Libro_id)
    {
        $this->findModel($Libro_id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Libros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Libro_id Libro ID
     * @return Libros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Libro_id)
    {
        if (($model = Libros::findOne(['Libro_id' => $Libro_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
