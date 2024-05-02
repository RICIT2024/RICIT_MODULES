<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Libros $model */
$hum_uid=Yii::$app->user->getId();    

$this->title = 'Create Libros';
$type = "Libro";
$action ="Crear";
$folder ="investigations";
?>
<div class="libros-create">

    <?= $this->render('@test/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="padding-top:10px; margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    
    <?= $this->render('_form', [
        'model' => $model,
        'hum_uid' => $hum_uid
    ]) ?>

</div>
