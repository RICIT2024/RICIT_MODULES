<?php

use ricit\humhub\modules\test\models\Ponencias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchP $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ponencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <?= $this->render('@test/views/layouts/nav-header', []) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    
    <p>
        <?= Html::a('Create Ponencias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           // 'Ponencia_id',
           // 'User_id',
            'Tipo',
            'Participación',
            'Autor',
            'Anio',
            //'País',
            'Titulo_evento',
            //'Titulo_ponencia',
            //'Resumen',
            //'Memoria',
            //'Publicación',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Ponencias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Ponencia_id' => $model->Ponencia_id]);
                 }
            ],
        ],
    ]); ?>


</div>
