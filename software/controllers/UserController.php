<?php

namespace ricit\humhub\modules\software\controllers;

use yii\data\ActiveDataProvider;
use humhub\components\behaviors\AccessControl;
use ricit\humhub\modules\software\models\software;
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
         //obtiene el identificador del contenedor, en este caso seria el contenedor del perfil de usuario
         $User_id = $this->contentContainer->id;

         $provider = new ActiveDataProvider([
             'query' => software::find()->where(['desarrollosoftware.User_id'=>$User_id]),
             'pagination' => [
                 'pageSize' => 10, // Adjust page size as needed
             ],
             'sort' => [
                 'attributes' => [
                    'Software_id',
                    'User_id',
                    'autor',
                    'anio_publicacion',
                    'titulo',
                    'sistema',
                    'descripcion',
                    'disponible'
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

