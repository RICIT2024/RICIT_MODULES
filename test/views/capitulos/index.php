<?php

use ricit\humhub\modules\test\models\CapLibros;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchC $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Capitulos de Libros';
?>
<div class="cap-libros-index">
    <div class="container-fluid">
        <?= $this->render('@test/views/layouts/nav-header', []) ?>
        
        <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
            <?= Html::encode($this->title) ?>
        </h1>
        <p>
            <?= Html::a('Registrar', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'Cap_id',
                'User_id',
                'Anio',
                'Titulo_capitulo',
                'Paginas',
                //'Autor_libro',
                //'Autores_capitulo',
                //'Titulo_libro',
                //'Resumen',
                //'Editores',
                //'ISBN',
                //'URL:url',
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, CapLibros $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'Cap_id' => $model->Cap_id]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>
