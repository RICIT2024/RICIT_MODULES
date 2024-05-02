<?php

use yii\helpers\Html;
use ricit\humhub\modules\test\models\Articulos;

/** @var yii\web\View $this */
/** @var app\models\Articulos $model */
$articulo = New Articulos();
$hum_uid = $articulo->getId();

$this->title = 'Update Articulos: ' . $model->Articulos_id;
$type = "Articulo";
$action ="Update";
$folder ="articulos";
?>

<div class="articulos-update">

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
        'hum_uid' => $hum_uid
    ]) ?>

</div>
