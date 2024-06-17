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

?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Producción tecnológica</strong><br> 
        <div class="panel-heading"><strong>Patentes</strong> <br>


        
        <br><p>
            <?= Html::a("Editar", Url::to(["patentes" . '/index']), ['class' => ' btn btn-primary'])?>
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
            'autor',
            'titulo_invencion',
            'estatus_invencion',
            'asignatario',
            'anio_estatus'
        ],
    ]); ?>
    </div>
</div>