<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Libros $model */

$this->title = 'Update Libros: ' . $model->Libro_id;
$type = "Capitulos";
$action ="Update";
$folder ="capitulos";
?>
<div class="libros-update">

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
        'hum_uid' => $model->User_id
    ]) ?>

</div>
