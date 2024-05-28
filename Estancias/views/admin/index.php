<?php

use ricit\humhub\modules\Estancias\models\EstanciasInvestigacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\SearchEI $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Estancias de Investigación';
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Estancias de Investigación</strong>

        <p><br>
            <?= Html::a("Editar", Url::to(["estancias" . '/index']), ['class' => ' btn btn-primary'])?>
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
            'Institucion',
            'Pais',
            'Periodo',
        ],
    ]); ?>
    </div>
</div>