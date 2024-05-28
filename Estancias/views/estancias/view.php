<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\EstanciasInvestigacion $model */

\yii\web\YiiAsset::register($this);
?>
<div class="estancias-investigacion-view">

    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32; color: #FFFFFF;']) ?>    
    </p>

    <p>
        <?= Html::a('Actualizar', ['update', 'Estancia_id' => $model->Estancia_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'Estancia_id' => $model->Estancia_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de eliminar esta estancia?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Estancia_id',
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
            'Institucion',
            'Pais',
            'Periodo',
        ],
    ]) ?>

</div>
