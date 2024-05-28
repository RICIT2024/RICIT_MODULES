<?php
use ricit\humhub\modules\certifi\models\Certifi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\SearchCert $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Certificaciones';
?>
<div class="Certifi-index">
    
    <br><h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
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
            'Nombre_cert',
            'Institución',
            'Vigencia',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Certifi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Certificacion_id' => $model->Certificacion_id]);
                 }
            ],
        ],
    ]); ?>


</div>
