<?php

use ricit\humhub\modules\RecursosHumanos\models\Docencia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchD $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Administrador';
?>

<div class="container-fluid">
    <div class="panel panel-default">        
        <div class="panel-body">
        <div class="panel-heading"><strong>Estancias</strong> <?= Yii::t('EstanciasModule.base', 'configuration') ?></div>

        <p>
            <?= Html::a("Editar", Url::to(["estancias" . '/index']), ['class' => ' btn btn-primary'])?>
        </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'Docencia_id',
                    'User_id',
                    'Dependencia',
                    'Nivel_impartido',
                    'Nombre_programa',
                    //'Pais',
                    //'Estado',
                    //'Nombre_asignatura',
                    //'Periodo',

                ],
            ]); ?>
        </div>
    </div>
</div>