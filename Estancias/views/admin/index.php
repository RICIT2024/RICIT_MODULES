<?php

use ricit\humhub\modules\Estancias\models\EstanciasInvestigacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchEI $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Estancias Investigacions';
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Estancias</strong> <?= Yii::t('EstanciasModule.base', 'configuration') ?></div>

        <div class="panel-body">
            <p><?= Yii::t('EstanciasModule.base', 'Welcome to the admin only area.') ?></p>
        </div>

        <p>
            <?= Html::a("Editar", Url::to(["estancias" . '/index']), ['class' => ' btn btn-primary'])?>
        </p>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Estancia_id',
            'User_id',
            'Institucion',
            'Pais',
            'Periodo',
        ],
    ]); ?>
    </div>
</div>