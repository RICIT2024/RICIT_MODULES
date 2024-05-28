<?php

namespace ricit\humhub\modules\Estancias\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use humhub\modules\admin\components\Controller;
use ricit\humhub\modules\Estancias\models\SearchEI;
use ricit\humhub\modules\Estancias\models\EstanciasInvestigacion;

class AdminController extends Controller
{

    /**
     * Render admin only page
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchEI();
        $dataProvider = $searchModel->searchAll($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);    
    }

}

