<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tesis $model */

$this->title = $model->Tesis_id;

$type = "Tesis";
$action ="Ver";
$folder ="tesis";

\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">

    <?= $this->render('@test/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    <p>
        <?= Html::a('Update', ['update', 'Tesis_id' => $model->Tesis_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Tesis_id' => $model->Tesis_id], [
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
            'Tesis_id',
            'User_id',
            'Autor',
            'Grado_academico',
            'Institucion_procedencia',
            'Anio',
            'Titulo',
            'Pais',
        ],
    ]) ?>

</div>
