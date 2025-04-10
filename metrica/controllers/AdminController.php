<?php

namespace ricit\humhub\modules\metrica\controllers;

use yii\web\Controller;
use ricit\humhub\modules\metrica\models\metrica;
use yii\helpers\Json;

class AdminController extends Controller
{
    public function actionIndex()
    {
        // Obtener datos para el gráfico de rangoga
        $rangogaData = metrica::find()
            ->select(['rangoga', 'COUNT(*) as total'])
            ->groupBy('rangoga')
            ->asArray()
            ->all();

        // Obtener datos para el gráfico de SNI
        $sniData = metrica::find()
            ->select(['sni', 'COUNT(*) as total'])
            ->groupBy('sni')
            ->asArray()
            ->all();

        $sniResumen = ['CANDIDATO' => 0, 'Con SNI' => 0];
        $nivelesSNI = ['SNI_I' => 0, 'SNI_II' => 0, 'SNI_III' => 0];

        foreach ($sniData as $row) {
            $valor = strtoupper(trim($row['sni']));
            if ($valor === 'CANDIDATO') {
                $sniResumen['CANDIDATO'] = (int) $row['total'];
            } elseif (in_array($valor, ['SNI_I', 'SNI_II', 'SNI_III'])) {
                $sniResumen['Con SNI'] += (int) $row['total']; // ← SUMA en lugar de sobrescribir
                $nivelesSNI[$valor] = (int) $row['total'];
            }
        }
        

        // Obtener datos para el gráfico de entidades
        $entidadData = metrica::find()
            ->select(['entidad', 'COUNT(*) as cantidad'])
            ->groupBy('entidad')
            ->asArray()
            ->all();

        // Convertir los datos de entidad en formato JSON para usarlos en el mapa
        $entidadDataJson = Json::encode($entidadData);

        // Pasar los datos a la vista
        return $this->render('index', [
            'rangogaData' => $rangogaData,
            'sniResumen' => $sniResumen,
            'nivelesSNI' => $nivelesSNI,
            'entidadData' => $entidadDataJson,
        ]);
    }
}
