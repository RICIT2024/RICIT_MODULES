<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;


/** @var yii\web\View $this */
/** @var app\models\Articulos $model */

\yii\web\YiiAsset::register($this);
?>
<div class="articulos-view">
    
    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32;']) ?>    
    </p>

    <p>
        <?= Html::a('Actualizar', ['update', 'Articulos_id' => $model->Articulos_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'Articulos_id' => $model->Articulos_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de eliminar este artículo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Articulos_id',
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
            'Autor',
            'Autores',
            'Anio',
            'Titulo',
            'Resumen',
            'Revista',
            'Pais',
            'Idioma',
            'URL:url',
            'DOI',
            'Palabras_clave',
        ],
    ]) ?>

</div>
