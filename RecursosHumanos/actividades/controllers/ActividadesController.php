<?php

namespace ricit\humhub\modules\actividades\controllers;;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use ricit\humhub\modules\actividades\models\actividades;
use ricit\humhub\modules\actividades\models\SearchA;
use humhub\modules\user\components\BaseAccountController;
use yii\web\User;


/**
 * ActividadesController implements the CRUD actions for actividades model.
 */
class ActividadesController extends BaseAccountController
{
         /**
    * @inheritdoc
    */
    public function init()
    {
        $this->appendPageTitle(Yii::t('ActividadesModule.base', 'actividades'));
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
     * Lists all actividades models.
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
            $this->subLayout = '@actividades/views/layouts/' . $sublayout;
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
     * Displays a single actividades model.
     * @param int $Actividades_id Actividades ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Actividades_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;


        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@actividades/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Actividades_id),
        ]);
    }

    /**
     * Creates a new actividades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new actividades();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Actividades_id' => $model->Actividades_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing actividades model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Actividades_id Actividades ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Actividades_id)
    {
        $model = $this->findModel($Actividades_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Actividades_id' => $model->Actividades_id]);
        }

        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@actividades/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing actividades model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Actividades_id Actividades ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Actividades_id)
    {
        $this->findModel($Actividades_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the actividades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Actividades_id Actividades ID
     * @return actividades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Actividades_id)
    {
        if (($model = actividades::findOne(['Actividades_id' => $Actividades_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
