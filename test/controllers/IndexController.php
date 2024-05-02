<?php

namespace ricit\humhub\modules\test\controllers;

use humhub\components\Controller;

use ricit\humhub\modules\test\models\SearchA;
use ricit\humhub\modules\test\models\SearchC;
use ricit\humhub\modules\test\models\SearchP;
use ricit\humhub\modules\test\models\SearchSP;

class IndexController extends Controller
{

    public $subLayout = "@test/views/layouts/default";

    /**
     * Renders the index view for the module
     *
     * @return string
     */
    public function actionIndex()
    {
        //Capitulo de libro
        $searchModelC = new SearchC();
        $dataProviderC = $searchModelC->searchAll($this->request->queryParams);
        //Articulo
        $searchModelA = new SearchA();
        $dataProviderA = $searchModelA->searchAll($this->request->queryParams);
        //Libro
        $searchModelL = new SearchSP();
        $dataProviderL = $searchModelL->searchAll($this->request->queryParams);
        //Ponencia
        $searchModelP = new SearchP();
        $dataProviderP = $searchModelP->searchAll($this->request->queryParams);

        $combinedDataProvider = [
            'dataProvider1' => $dataProviderC,
            'dataProvider2' => $dataProviderA,
            'dataProvider3' => $dataProviderL,
            'dataProvider4' => $dataProviderP,
        ];

        $combinedSearch = [
            'searchModel1' => $dataProviderC,
            'searchModel2' => $searchModelA,
            'searchModel3' => $searchModelL,
            'searchModel4' => $searchModelP,
        ];

        return $this->render('index',[
        'combinedDataProvider' => $combinedDataProvider,
        'combinedSearch' => $combinedSearch,
        ]);        
    }

}

