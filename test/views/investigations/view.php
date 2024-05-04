<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Libros $model */

$this->title = $model->Libro_id;
$this->params['breadcrumbs'][] = $this->title;

$type = "Libros";
$action ="Ver";
$folder ="investigations";

\yii\web\YiiAsset::register($this);
?>
<div class="libros-view">
    
    <?= $this->render('@test/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    
    <p>
        <?= Html::a('Actualizar', ['update', 'Libro_id' => $model->Libro_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'Libro_id' => $model->Libro_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que deseas eliminar el registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Libro_id',
            'User_id',
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
