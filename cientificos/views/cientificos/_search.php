<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchC $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cientificos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Eventos_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'Evento') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Participación') ?>

    <?= $form->field($model, 'Titulo') ?>

    <?= $form->field($model, 'Anio') ?>

    <?= $form->field($model, 'Pais') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
