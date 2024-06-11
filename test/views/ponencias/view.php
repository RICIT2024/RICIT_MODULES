<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var app\models\Ponencias $model */

\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">

    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32;']) ?>    
    </p>

    <p>
        <?= Html::a('Actualizar', ['update', 'Ponencia_id' => $model->Ponencia_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'Ponencia_id' => $model->Ponencia_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de eliminar esta ponencia?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <span style="margin:5px;">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'Ponencia_id',
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
                'Tipo',
                'Participación',
                'Autor',
                'Anio',
                'País',
                'Titulo_evento',
                'Titulo_ponencia',
                'Resumen',
                'Memoria',
                'Publicación',
            ],
        ]) ?>
    </span>
</div>
