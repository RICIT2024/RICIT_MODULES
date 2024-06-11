<?php

use ricit\humhub\modules\test\models\Tesis;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var ricit\humhub\modules\RecursosHumanos\models\SearchT $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tesis';
?>
<div class="container-fluid">

    <?= $this->render('@test/views/layouts/nav-header', []) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    
    <p>
        <?= Html::a('Registrar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Tesis_id',
            //'User_id',
            'Autor',
            'Grado_academico',
            'Institucion_procedencia',
            'Anio',
            'Titulo',          
            //'Pais',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Tesis $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Tesis_id' => $model->Tesis_id]);
                 }
            ],
        ],
    ]); ?>


</div>
