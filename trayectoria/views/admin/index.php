<?php

use ricit\humhub\modules\trayectoria\models\trayectoria;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\SearchT $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Experiencia Laboral';
?>

<div class="container-fluid">
    <div class="panel panel-default">        
        <div class="panel-body">
        <div class="panel-heading"><strong>Experiencia Laboral</strong> <br>

        <br><p>
            <?= Html::a("Editar", Url::to(["trayectoria" . '/index']), ['class' => ' btn btn-primary'])?>
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
                    'sector',
                    'dependencia',
                    //'pais',
                    //'estado',
                    'cargo',
                    //'periodo'

                ],
            ]); ?>
        </div>
    </div>
</div>