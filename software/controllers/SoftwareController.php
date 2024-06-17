<?php

namespace ricit\humhub\modules\software\controllers;

use Yii;
use ricit\humhub\modules\software\models\software;
use ricit\humhub\modules\software\models\SearchS;
use humhub\modules\user\components\BaseAccountController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SoftwareController implements the CRUD actions for software model.
 */
class SoftwareController extends BaseAccountController
{
     /**
    * @inheritdoc
    */
    public function init()
    {
        $this->appendPageTitle(Yii::t('SoftwareModule.base', 'software'));
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
     * Lists all software models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $User_id = Yii::$app->user->getId();
        $searchModel = new SearchS();
        $sublayout = 'default';

        if(Yii::$app->user->isAdmin() ){
            $dataProvider = $searchModel->searchAll($this->request->queryParams);
            $this->subLayout = '@software/views/layouts/' . $sublayout;
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
     * Displays a single software model.
     * @param int $Software_id Software ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Software_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@software/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($Software_id),
        ]);
    }

    /**
     * Creates a new software model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new software();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Software_id' => $model->Software_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing software model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Software_id Software ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Software_id)
    {
        $model = $this->findModel($Software_id);
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Software_id' => $model->Software_id]);
        }
        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@software/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing software model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Software_id Software ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Software_id)
    {
        $this->findModel($Software_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the software model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Software_id Software ID
     * @return software the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Software_id)
    {
        if (($model = software::findOne(['Software_id' => $Software_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
