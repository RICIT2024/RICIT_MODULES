<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use ricit\humhub\modules\test\models\Articulos;

/** @var yii\web\View $this */
/** @var ricit\models\SearchA $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// Register the external JavaScript file
$this->title = 'Articulos';
?>

<div class="articulos-index">
    <div class="container-fluid">
        <?= $this->render('@test/views/layouts/nav-header', []) ?>

        <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
            <?= Html::encode($this->title) ?>
        </h1>
        
        <p>
            <?= Html::a('Create Articulos', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div style="text-align: center;">
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'Articulos_id',
                    'headerOptions' => ['style' => 'text-align: center; width:80px'],
                ],
                //'User_id',
                [
                    'attribute' => 'Autor',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                [
                    'attribute' => 'Autores',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                [
                    'attribute' => 'Anio',
                    'headerOptions' => ['style' => 'text-align: center;  width:50px;'],
                ],
                [
                    'attribute' => 'Titulo',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                //'Resumen',
                    //'Revista',
                    //'Pais',
                    //'Idioma',
                    //'ISSNs',
                    //'URL:url',
                    //'DOI',
                    //'Palabras_clave',
                // Add other columns with centered headers as needed
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Articulos $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'Articulos_id' => $model->Articulos_id]);
                    }
                    ],
                ],
            ]); ?>
        </div>  
      
    </div>
</div>
