<?php

use ricit\humhub\modules\patentes\models\patentes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\SearchP $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Producción Tecnológica';

?>
<div class="patentes-index">

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    <h2 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        Patentes
    </h2>

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
            //'Patentes_id',
            //'User_id',
            'autor',
            'titulo_invencion',
            'estatus_invencion',
            //'clasificacion',
            'asignatario',
            'anio_estatus',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, patentes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Patentes_id' => $model->Patentes_id]);
                 }
            ],
        ],
    ]); ?>


</div>
