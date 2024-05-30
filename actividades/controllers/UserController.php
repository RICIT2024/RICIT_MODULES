<?php

namespace ricit\humhub\modules\actividades\controllers;

use yii\data\ActiveDataProvider;
use humhub\components\behaviors\AccessControl;
use ricit\humhub\modules\actividades\models\actividades;
use humhub\modules\content\components\ContentContainerController;


class UserController extends ContentContainerController
{

    public function behaviors()
    {
        return [
            'acl' => [
                'class' => AccessControl::class,
                'guestAllowedActions' => ['index']
            ]
        ];
    }

    /**
     * Renders the index view for the module
     *
     * @return string
     */
    public function actionIndex()
    {
        $User_id = $this->contentContainer->id;

        $provider = new ActiveDataProvider([
            'query' => actividades::find()->where(['actividades_complementarias.User_id'=>$User_id]),
            'pagination' => [
                'pageSize' => 10, // Adjust page size as needed
            ],
            'sort' => [
                'attributes' => [
                    'Dependencia',
                    'Anio_ingreso',
                    'Fecha',
                    'URL'
                ],
            ],
        ]);

        // returns an array of Post objects
        return $this->render('index', [
            'dataProvider' => $provider,
            'user' => $this->contentContainer
         ]);

    }

}

