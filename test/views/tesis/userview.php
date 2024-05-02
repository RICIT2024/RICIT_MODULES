<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tesis $model */

$this->title = $model->Tesis_id;
$type = "Ponencias";
$action ="View";
$folder ="ponencias";

\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>

    <span style="margin:5px;">
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
    </span>
</div>
