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
    <div class="panel panel-default">        
        <div class="panel-body">
        <div class="panel-heading"><strong>Formación de Recursos Humanos</strong> <br>

        <br><p>
            <?= Html::a("Editar", Url::to(["docencia" . '/index']), ['class' => ' btn btn-primary'])?>
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
                    'Dependencia',
                    //'Nivel_impartido',
                    'Nombre_programa',
                    //'Pais',
                    //'Estado',
                    'Nombre_asignatura',
                    //'Periodo',

                ],
            ]); ?>
        </div>
    </div>
</div>