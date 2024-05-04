<?php

use humhub\widgets\Button;
use humhub\widgets\GridView;
use ricit\humhub\modules\test\models\SearchA;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\test\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('TestModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;
$hum_uid=Yii::$app->user->getId();



?>

<div class="panel-heading"><strong>Producción Cientifica</strong> <?= Yii::t('TestModule.base', 'overview') ?></div>

<div class="container-fluid">
    <!--Capitulo de Libro-->
    <h2 style="text-align:center;">LIBROS</h2>
    <?= GridView::widget([
        'dataProvider' => $combinedDataProvider['dataProvider1'],
        'filterModel' => $combinedSearch['searchModel1'], // Assuming this is your search model
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'Cap_id',
                    //'User_id',
                    //'Titulo_libro',
                    //'Autor_libro',
                    'Anio',
                    'Titulo_capitulo',
                    'Paginas',
                    'Autores_capitulo',
                    'Resumen',
                    //'Editores',
                    //'ISBN',
                    //'URL:url',
                ],
    ]); ?>

    <br>

    <!--Articulo-->
    <?= GridView::widget([
        'dataProvider' => $combinedDataProvider['dataProvider2'],
        'filterModel' => $combinedSearch['searchModel2'], // Assuming this is your search model
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'Articulos_id',
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
                    'label' => 'Año',
                    'headerOptions' => ['style' => 'text-align: center;  width:50px;'],
                ],
                [
                    'attribute' => 'Titulo',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                [
                    'attribute' => 'Resumen',
                    'label' => 'Resumen',
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
                ],
    ]); ?>

    <br>

    <!--Libro-->
    <?= GridView::widget([
        'dataProvider' => $combinedDataProvider['dataProvider3'],
        'filterModel' => $combinedSearch['searchModel3'], // Assuming this is your search model
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'Articulos_id',
                //'User_id',
                [
                    'attribute' => 'Autor',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                [
                    'attribute' => 'Autores_sec',
                    'label' => 'Autores Secundario',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                [
                    'attribute' => 'Anio',
                    'label' => 'Año',
                    'headerOptions' => ['style' => 'text-align: center;  width:50px;'],
                ],
                [
                    'attribute' => 'Titulo',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                [
                    'attribute' => 'Resumen',
                    'label' => 'Resumen',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                    //'Revista',
                    //'Pais',
                    //'Idioma',
                    //'ISSNs',
                    //'URL:url',
                    //'DOI',
                    //'Palabras_clave',
                // Add other columns with centered headers as needed
                ],
    ]); ?>

    <br>

    <!--Ponencia-->
    <?= GridView::widget([
        'dataProvider' => $combinedDataProvider['dataProvider4'],
        'filterModel' => $combinedSearch['searchModel4'], // Assuming this is your search model
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'Tipo',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                [
                    'attribute' => 'Autor',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                [
                    'attribute' => 'Anio',
                    'label' => 'Año',
                    'headerOptions' => ['style' => 'text-align: center;  width:50px;'],
                ],
                [
                    'attribute' => 'Titulo_Ponencia',
                    'label' => 'Titulo',
                    'headerOptions' => ['style' => 'text-align: center;'],
                ],
                [
                    'attribute' => 'Resumen',
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
                ],
    ]); ?>

</div>
