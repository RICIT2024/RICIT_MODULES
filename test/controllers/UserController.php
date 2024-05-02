<?php

namespace ricit\humhub\modules\test\controllers;

use Yii;

use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use ricit\humhub\modules\test\models\Libros;
use ricit\humhub\modules\test\models\CapLibros;

use humhub\components\behaviors\AccessControl;
use ricit\humhub\modules\test\models\ScientificProduction;
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
            'query' => ScientificProduction::find()->where(['scientific_production.User_id'=>$User_id])
                ->select([
                    'scientific_production.P_id',
                    'COALESCE(libros.Autor, cap_libros.Autores_capitulo, articulos.Autor, ponencias.Autor) AS Autor',
                    'COALESCE(libros.Anio, cap_libros.Anio, articulos.Anio, ponencias.Anio) AS Anio',
                    'COALESCE(libros.Titulo, cap_libros.Titulo_capitulo, articulos.Titulo, ponencias.Titulo_ponencia) AS Titulo',
                    'COALESCE(libros.Resumen, cap_libros.Resumen, articulos.Resumen, ponencias.Resumen) AS Resumen',
                    'scientific_production.Tipo'
                ])
                ->leftJoin('libros', 'scientific_production.P_id = libros.Libro_id')
                ->leftJoin('cap_libros', 'scientific_production.P_id = cap_libros.Cap_id')
                ->leftJoin('articulos', 'scientific_production.P_id = articulos.Articulos_id')
                ->leftJoin('ponencias', 'scientific_production.P_id = ponencias.Ponencia_id'),
            'pagination' => [
                'pageSize' => 10, // Adjust page size as needed
            ],
            'sort' => [
                'attributes' => [
                    'P_id',
                    'Autor',
                    'Anio',
                    'Titulo',
                    'Resumen',
                    'Tipo',
                ],
            ],
        ]);

        // returns an array of Post objects
        return $this->render('index', [
            'dataProvider' => $provider,
         ]);
    }

    
    /**
     * Displays a single CapLibros model.
     * @param int $P_id Producto Cientifico ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($SP_id)
    {

        return $this->render('view', [
            'model' => $this->findModel($SP_id),
        ]);
    }

        /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return CapLibros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($SP_id)
    {
        if (($model = ScientificProduction::findOne(['SP_id' => $SP_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

