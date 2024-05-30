<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\actividades $model */

\yii\web\YiiAsset::register($this);
?>
<div class="actividades-view">

    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32;']) ?>    
    </p>

    <p>
        <?= Html::a('Actualizar', ['update', 'Actividades_id' => $model->Actividades_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'Actividades_id' => $model->Actividades_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de eliminar esta actividad complementaria?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Actividades_id',
            [
                'label' => 'Usuario',
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
            'Anio_ingreso',
            'Fecha',
            'URL:url',
        ],
    ]) ?>

</div>
