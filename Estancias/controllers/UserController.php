<?php

namespace ricit\humhub\modules\Estancias\controllers;

use yii\data\ActiveDataProvider;

use humhub\components\behaviors\AccessControl;
use ricit\humhub\modules\Estancias\models\EstanciasInvestigacion;
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
     * Renders the index view for the user menu module
     *
     * @return string
     */
    public function actionIndex()
    {
        //obtiene el identificador del contenedor, en este caso seria el contenedor del perfil de usuario
        $User_id = $this->contentContainer->id;

        $provider = new ActiveDataProvider([
            'query' => EstanciasInvestigacion::find()->where(['estancias_investigacion.User_id'=>$User_id]),
            'pagination' => [
                'pageSize' => 10, // Adjust page size as needed
            ],
            'sort' => [
                'attributes' => [
                    'Institucion',
                    'Pais',
                    'Periodo',
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

