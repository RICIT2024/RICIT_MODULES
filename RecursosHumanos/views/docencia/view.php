<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\Docencia $model */

\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
    

    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32; color: #FFFFFF;']) ?>    
    </p>

    <p>
        <?= Html::a('Actualizar', ['update', 'Docencia_id' => $model->Docencia_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'Docencia_id' => $model->Docencia_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de eliminar esta docencia?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Docencia_id',
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
            'Nivel_impartido',
            'Nombre_programa',
            'Pais',
            'Estado',
            'Nombre_asignatura',
            'Periodo',
        ],
    ]) ?>

</div>
