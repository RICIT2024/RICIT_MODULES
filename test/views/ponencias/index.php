<?php

use ricit\humhub\modules\test\models\Ponencias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var app\models\SearchP $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$ponenciaModel = new Ponencias();

$this->title = 'Ponencias';
?>
<div class="container-fluid">

<div id="row two">
    <p style="text-align: center; font-weight:bold;"><?= Yii::t('TestModule.base', 'Ponencias Por Tipo.') ?></p>
    <div style="display: flex; gap:25px; justify-content:center; align-items:center; flex-wrap: wrap;" id="Values">
        <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
            <i class="fa fa-book"></i>    
            <p> <?= \ricit\humhub\modules\test\models\Ponencias::getTotalCongreso(); ?> </p>
            <h6>Congreso</h6>
        </div>
        <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
            <i class="fa fa-book"></i>    
            <p> <?= \ricit\humhub\modules\test\models\Ponencias::getTotalSimposio(); ?></p>
            <h6>Simposio</h6>
        </div>
        <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
            <i class="fa fa-book"></i>    
            <p> <?= \ricit\humhub\modules\test\models\Ponencias::getTotalForo(); ?></p>
            <h6>Foro</h6>
        </div>
        <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
            <i class="fa fa-book"></i>    
            <p> <?= \ricit\humhub\modules\test\models\Ponencias::getTotalSeminario(); ?></p>
            <h6>Seminario</h6>
        </div>
        <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
            <i class="fa fa-book"></i>    
            <p> <?= \ricit\humhub\modules\test\models\Ponencias::getTotalPanel(); ?></p>
            <h6>Panel</h6>
        </div>
        <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
            <i class="fa fa-book"></i>    
            <p> <?= \ricit\humhub\modules\test\models\Ponencias::getTotalOtro(); ?></p>
            <h6>Otro</h6>
        </div>
    </div>
</div>    

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
        'Tipo',
        'Participación',
        'Autor',
        'Anio',
        'Titulo_evento',
        [
            'class' => ActionColumn::class,
            'urlCreator' => function ($action, Ponencias $model, $key, $index, $column) {
                return Url::toRoute([$action, 'Ponencia_id' => $model->Ponencia_id]);
            }
        ],
    ],
]); ?>

</div>
