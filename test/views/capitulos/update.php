<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CapLibros $model */

$this->title = 'Update Cap Libros: ' . $model->Cap_id;
$type = "Capitulos";
$action ="Update";
$folder ="capitulos";
?>
<div class="cap-libros-update">

    <?= $this->render('@test/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    
    <?= $this->render('_form', [
        'model' => $model,
        'hum_uid' => $model->User_id
    ]) ?>

</div>
