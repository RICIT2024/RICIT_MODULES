<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;


/** @var yii\web\View $this */
/** @var app\models\Libros $model */

\yii\web\YiiAsset::register($this);
?>
<div class="libros-view">
    
    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32;']) ?>    
    </p>
    
    <p>
        <?= Html::a('Actualizar', ['update', 'Libro_id' => $model->Libro_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'Libro_id' => $model->Libro_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de eliminar este libro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Libro_id',
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
            'Autores_sec',
            'Anio',
            'Titulo',
            'Resumen',
            'Editorial',
            'ISBN',
            'Formato',
            'DOI',
            'URL:url',
            'Palabras_clave',
        ],
    ]) ?>

</div>
