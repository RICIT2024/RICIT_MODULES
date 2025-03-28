<?php

namespace ricit\humhub\modules\test\controllers;

use yii\data\ActiveDataProvider;
use humhub\modules\admin\components\Controller;

//Models for ID
use ricit\humhub\modules\test\models\ScientificProduction;


class AdminController extends Controller
{

    /**
     * Render admin only page
     *
     * @return string
     */
    
     public function actionIndex()
{
    $model = new ScientificProduction();
    
    // Proveedor de datos para la producción científica
    $dataProvider = new ActiveDataProvider([
        'query' => ScientificProduction::find()
            ->select([
                'scientific_production.P_id',
                'COALESCE(libros.Autor, cap_libros.Autores_capitulo, articulos.Autor, ponencias.Autor, tesis.Autor) AS Autor',
                'COALESCE(libros.Anio, cap_libros.Anio, articulos.Anio, ponencias.Anio, tesis.Anio) AS Anio',
                'COALESCE(libros.Titulo, cap_libros.Titulo_capitulo, articulos.Titulo, ponencias.Titulo_ponencia, tesis.Titulo) AS Titulo',
                'COALESCE(libros.Resumen, cap_libros.Resumen, articulos.Resumen, ponencias.Resumen) AS Resumen',
                'scientific_production.Tipo'
            ])
            ->leftJoin('libros', 'scientific_production.P_id = libros.Libro_id')
            ->leftJoin('cap_libros', 'scientific_production.P_id = cap_libros.Cap_id')
            ->leftJoin('articulos', 'scientific_production.P_id = articulos.Articulos_id')
            ->leftJoin('ponencias', 'scientific_production.P_id = ponencias.Ponencia_id')
            ->leftJoin('tesis', 'scientific_production.P_id = tesis.Tesis_id'),
        'pagination' => [
            'pageSize' => 10,
        ],
        'sort' => [
            'attributes' => ['P_id', 'Autor', 'Anio', 'Titulo', 'Resumen', 'Tipo'],
        ],
    ]);

    // Proveedor de datos específico para artículos (si se necesita)
    $dataProviderArticulos = new ActiveDataProvider([
        'query' => \ricit\humhub\modules\test\models\Articulos::find(),
        'pagination' => ['pageSize' => 10],
    ]);

    return $this->render('index', [
        'dataProvider' => $dataProvider,
        'dataProviderArticulos' => $dataProviderArticulos, // Se envía la variable esperada
        'model' => $model,
    ]);
}

}

