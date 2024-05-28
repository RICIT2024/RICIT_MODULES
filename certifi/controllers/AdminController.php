<?php

namespace ricit\humhub\modules\certifi\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use humhub\modules\admin\components\Controller;
use ricit\humhub\modules\certifi\models\SearchCert;
use ricit\humhub\modules\certifi\models\Certifi;

class AdminController extends Controller
{

    /**
     * Render admin only page
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchCert();
        $dataProvider = $searchModel->searchAll($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);    
    }

}

