<?php

namespace ricit\humhub\modules\test\controllers;

use Yii;
use ricit\humhub\modules\test\models\SearchC;
use ricit\humhub\modules\test\models\CapLibros;

use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use humhub\modules\user\components\BaseAccountController;

/**
 * CapitulosController implements the CRUD actions for CapLibros model.
 */
class CapitulosController extends BaseAccountController
{

    /**
    * @inheritdoc
    */
    public function init()
    {
        $this->appendPageTitle(Yii::t('TestModule.base', 'Capitulos'));
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
     * Lists all CapLibros models.
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
     * Displays a single CapLibros model.
     * @param int $Cap_id Cap ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Cap_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@test/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Cap_id),
        ]);
    }

    /**
     * Creates a new CapLibros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CapLibros();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Cap_id' => $model->Cap_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CapLibros model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Cap_id Cap ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Cap_id)
    {
        $model = $this->findModel($Cap_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Cap_id' => $model->Cap_id]);
        }

        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@test/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CapLibros model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Cap_id Cap ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Cap_id)
    {
        $this->findModel($Cap_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CapLibros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Cap_id Cap ID
     * @return CapLibros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Cap_id)
    {
        if (($model = CapLibros::findOne(['Cap_id' => $Cap_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
