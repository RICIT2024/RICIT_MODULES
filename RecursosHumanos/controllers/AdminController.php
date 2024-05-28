<?php

namespace ricit\humhub\modules\RecursosHumanos\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use humhub\modules\admin\components\Controller;
use ricit\humhub\modules\RecursosHumanos\models\SearchD;
use ricit\humhub\modules\RecursosHumanos\models\Docencia;

class AdminController extends Controller
{

    /**
     * Render admin only page
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchD();
        $dataProvider = $searchModel->searchAll($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);      
    }

}

