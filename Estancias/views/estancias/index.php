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
<div class="estancias-investigacion-index">

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

            'Estancia_id',
            'User_id',
            'Institucion',
            'Pais',
            'Periodo',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, EstanciasInvestigacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Estancia_id' => $model->Estancia_id]);
                 }
            ],
        ],
    ]); ?>


</div>
