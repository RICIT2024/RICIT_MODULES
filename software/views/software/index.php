<?php

use ricit\humhub\modules\software\models\software;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\SearchS $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Desarrollo de Software';
?>
<div class="software-index">

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
            
            'autor',
            //'anio_publicacion',
            'titulo',
            'sistema',
            'descripcion',
            'disponible',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, software $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Software_id' => $model->Software_id]);
                 }
            ],
        ],
    ]); ?>


</div>
