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
            $dataProviders = $searchModel->search(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProviders' => $dataProviders,
        ]);
    }
}
