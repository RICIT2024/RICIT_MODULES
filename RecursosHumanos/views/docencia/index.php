<?php

use ricit\humhub\modules\RecursosHumanos\models\Docencia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\SearchD $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Formación de Recursos Humanos';
?>
<div class="container-fluid">

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
            //'Docencia_id',
            //'User_id',
            'Dependencia',
            //'Nivel_impartido',
            'Nombre_programa',
            //'Pais',
            //'Estado',
            'Nombre_asignatura',
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
