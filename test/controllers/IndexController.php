<?php

namespace ricit\humhub\modules\test\controllers;

use Yii;
use yii\web\Controller;
use ricit\humhub\modules\test\models\SearchM;

class IndexController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new SearchM();
        $dataProviders = null;

        if (Yii::$app->request->queryParams) {
            if (isset(Yii::$app->request->queryParams['searchType']) && Yii::$app->request->queryParams['searchType'] == 'experts') {
                $dataProviders = $searchModel->searchExperts(Yii::$app->request->queryParams);
            } else {
                $dataProviders = $searchModel->search(Yii::$app->request->queryParams);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProviders' => $dataProviders,
        ]);
    }
}
