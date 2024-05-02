<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Articulos $model */

$this->title = $model->Titulo;

$this->params['breadcrumbs'][] = $this->title;
$type = "Articulo";
$action ="View";
$folder ="articulos";

\yii\web\YiiAsset::register($this);
?>
<div class="articulos-view">
    
    <?= $this->render('@test/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>

    <p>
        <?= Html::a('Update', ['update', 'Articulos_id' => $model->Articulos_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Articulos_id' => $model->Articulos_id], [
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
            'Articulos_id',
            'User_id',
            'Autor',
            'Autores',
            'Anio',
            'Titulo',
            'Resumen',
            'Revista',
            'Pais',
            'Idioma',
            'ISSNs',
            'URL:url',
            'DOI',
            'Palabras_clave',
        ],
    ]) ?>

</div>
