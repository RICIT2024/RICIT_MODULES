<?php
    use ricit\humhub\modules\test\models\ScientificProduction;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\grid\ActionColumn;
    use yii\grid\GridView;
    use yii\db\Query;
    
    
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('UserModule.profile', '<strong>Producción Científica</strong>') ?>
    </div>

    <h2>Artículos</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderArticulos,
        'columns' => [
            'Articulos_id',
            'Autor',
            'Autores',
            'Anio',
            'Titulo',
            'Resumen',
            // Agrega más columnas si es necesario
        ],
    ]) ?>

    <h2>Libros</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProviderLibros,
        'columns' => [
            'Libro_id',
            'Autor',
            'Autores_sec',
            'Anio',
            'Titulo',
            'Resumen',
            // Agrega más columnas si es necesario
        ],
    ]) ?>

    <h2>Capítulos de Libros</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProviderCapLibros,
        'columns' => [
            'Cap_id',
            'Autor_libro',
            'Autores_capitulo',
            'Anio',
            'Titulo_capitulo',
            'Resumen',
            // Agrega más columnas si es necesario
        ],
    ]) ?>

    <h2>Ponencias</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProviderPonencias,
        'columns' => [
            'Ponencia_id',
            'Autor',
            'Anio',
            'Titulo_ponencia',
            'Resumen',
            // Agrega más columnas si es necesario
        ],
    ]) ?>

    <h2>Tesis</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProviderTesis,
        'columns' => [
            'Tesis_id',
            'Autor',
            'Grado_academico',
            'Institucion_procedencia',
            'Anio',
            'Titulo',
            // Agrega más columnas si es necesario
        ],
    ]) ?>
</div>
