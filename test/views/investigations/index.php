<?php

use ricit\humhub\modules\test\models\Libros;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\SearchSP $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Libros';
?>
<div class="libros-index">
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
                //'Titulo',
                //'Resumen',
                //'Editorial',
                //'ISBN',
                //'Formato',
                //'DOI',
                //'URL:url',
                //'Palabras_clave',
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Libros $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'Libro_id' => $model->Libro_id]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>
