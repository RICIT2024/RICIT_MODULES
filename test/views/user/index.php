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
            [
                'attribute' => 'User_id',
                'value' => function ($model) {
                    $profile = (new Query())
                        ->select(['firstname', 'lastname'])
                        ->from('profile')
                        ->where(['user_id' => $model->User_id])
                        ->one();

                    return $profile ? $profile['firstname'] . ' ' . $profile['lastname'] : '';
                },
            ],
            'Autor',
            'Autores',
            'Anio',
            'Titulo',

        ],
    ]) ?>

    <h2>Libros</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderLibros,
        'columns' => [
            [
                'attribute' => 'User_id',
                'value' => function ($model) {
                    $profile = (new Query())
                        ->select(['firstname', 'lastname'])
                        ->from('profile')
                        ->where(['user_id' => $model->User_id])
                        ->one();

                    return $profile ? $profile['firstname'] . ' ' . $profile['lastname'] : '';
                },
            ],
            'Autor',
            'Autores_sec',
            'Anio',
            // Agrega más columnas si es necesario
        ],
    ]) ?>

    <h2>Capítulos de Libros</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderCapLibros,
        'columns' => [
            [
                'attribute' => 'User_id',
                'value' => function ($model) {
                    $profile = (new Query())
                        ->select(['firstname', 'lastname'])
                        ->from('profile')
                        ->where(['user_id' => $model->User_id])
                        ->one();

                    return $profile ? $profile['firstname'] . ' ' . $profile['lastname'] : '';
                },
            ],
            'Anio',
            'Titulo_capitulo',
            'Paginas',
            // Agrega más columnas si es necesario
        ],
    ]) ?>

    <h2>Ponencias</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderPonencias,
        'columns' => [
            'Tipo',
            'Participación',
            'Autor',
            'Anio',
            'Titulo_evento',
            // Agrega más columnas si es necesario
        ],
    ]) ?>

    <h2>Tesis</h2>
    <?=GridView::widget([
        'dataProvider' => $dataProviderTesis,
        'columns' => [
            'Autor',
            'Grado_academico',
            'Institucion_procedencia',
            'Anio',
            'Titulo',   
            // Agrega más columnas si es necesario
        ],
    ]) ?>
</div>
