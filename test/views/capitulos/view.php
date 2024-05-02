<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CapLibros $model */

$this->title = $model->Cap_id;
$this->params['breadcrumbs'][] = $this->title;

$type = "Capitulos";
$action ="View";
$folder ="capitulos";

\yii\web\YiiAsset::register($this);
?>
<div class="cap-libros-view">

    <?= $this->render('@test/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    
    <p>
        <?= Html::a('Update', ['update', 'Cap_id' => $model->Cap_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Cap_id' => $model->Cap_id], [
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
