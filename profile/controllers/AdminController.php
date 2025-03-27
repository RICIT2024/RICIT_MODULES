<?php

namespace ricit\humhub\modules\profile\controllers;

use yii;
use humhub\modules\admin\components\Controller;
use yii\web\NotFoundHttpException;
use ricit\humhub\modules\profile\models\SearchPr;
use ricit\humhub\modules\profile\models\profile;


class AdminController extends Controller
{

    /**
     * Render admin only page
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchPr();
        $dataProvider = $searchModel->searchAll($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);      
    }

}

