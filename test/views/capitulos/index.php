<?php

use ricit\humhub\modules\test\models\CapLibros;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\SearchC $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Capítulos de Libros';
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
                //'Palabras_clave',

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
