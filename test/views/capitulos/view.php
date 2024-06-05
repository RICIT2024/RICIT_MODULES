<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;


/** @var yii\web\View $this */
/** @var app\models\CapLibros $model */

\yii\web\YiiAsset::register($this);
?>
<div class="cap-libros-view">

    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32;']) ?>    
    </p>
    
    <p>
        <?= Html::a('Actualizar', ['update', 'Cap_id' => $model->Cap_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'Cap_id' => $model->Cap_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de eliminar este capítulo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Cap_id',
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
            'Anio',
            'Titulo_capitulo',
            'Autor_libro',
            'Autores_capitulo',
            'Resumen',
            'Paginas',
            'Titulo_libro',
            'Editores',
            'ISBN',
            'URL:url',
            'Palabras_clave'
        ],
    ]) ?>

</div>
