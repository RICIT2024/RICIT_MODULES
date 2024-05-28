<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchCert $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="certifi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Certificacion_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'Nombre_cert') ?>

    <?= $form->field($model, 'Institución') ?>

    <?= $form->field($model, 'Vigencia') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
