<?php

namespace ricit\humhub\modules\premios\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use humhub\modules\admin\components\Controller;
use ricit\humhub\modules\premios\models\SearchP;
use ricit\humhub\modules\premios\models\premios;



class AdminController extends Controller
{

    /**
     * Render admin only page
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchP();
        $dataProvider = $searchModel->searchAll($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);   
    }

}

