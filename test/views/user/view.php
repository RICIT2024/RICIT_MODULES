<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Libros $model */

$this->title = $model->P_id;
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="libros-view">  

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Cap_id',
            'User_id',
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
