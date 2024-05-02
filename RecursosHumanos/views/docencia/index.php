<?php

use ricit\humhub\modules\RecursosHumanos\models\Docencia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchD $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Docencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <?= $this->render('@RecursosHumanos/views/layouts/nav-header', []) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    <p>
        <?= Html::a('Create Docencia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Docencia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Docencia_id' => $model->Docencia_id]);
                 }
            ],
        ],
    ]); ?>


</div>
