<?php

namespace ricit\humhub\modules\test\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use ricit\humhub\modules\test\models\Libros;
use ricit\humhub\modules\test\models\CapLibros;
use ricit\humhub\modules\test\models\Articulos;
use ricit\humhub\modules\test\models\Ponencias;
use ricit\humhub\modules\test\models\Tesis;
use humhub\components\behaviors\AccessControl;
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

    public function actionIndex()
    {
        $userId = $this->contentContainer->id;

        $dataProviderArticulos = new ActiveDataProvider([
            'query' => Articulos::find()->where(['User_id' => $userId]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $dataProviderLibros = new ActiveDataProvider([
            'query' => Libros::find()->where(['User_id' => $userId]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $dataProviderCapLibros = new ActiveDataProvider([
            'query' => CapLibros::find()->where(['User_id' => $userId]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $dataProviderPonencias = new ActiveDataProvider([
            'query' => Ponencias::find()->where(['User_id' => $userId]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $dataProviderTesis = new ActiveDataProvider([
            'query' => Tesis::find()->where(['User_id' => $userId]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProviderArticulos' => $dataProviderArticulos,
            'dataProviderLibros' => $dataProviderLibros,
            'dataProviderCapLibros' => $dataProviderCapLibros,
            'dataProviderPonencias' => $dataProviderPonencias,
            'dataProviderTesis' => $dataProviderTesis,
        ]);
    }

}
