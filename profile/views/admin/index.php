<?php

use ricit\humhub\modules\profile\models\Profile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\SearchPr $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Extracción de datos del perfíl';
?>
<div class="container-fluid">
    <div class="panel panel-default">        
        <div class="panel-body">
        <div class="panel-heading"><strong>Extracción de datos del perfíl</strong> <br>

        <br><p>
        <?= Html::a("Exportar a Excel", ['profile/export-excel'], ['class' => 'btn btn-primary']) ?>
        </p>
        
        

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'user_id',
                    'firstname',
                    'lastname',
                    'gender',
                    'about',
                    'entidad',
                    'municipio',
                    'rangoga',
                    'aniosexperiencias',
                    'sni',
                ],
            ]); ?>
        </div>
    </div>
</div>
