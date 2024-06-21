<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\premios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="premios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>

    <?php
        $tipoOptions = [
            'Premio' => 'Premio',
            'Reconocimiento' => 'Reconocimiento',
            'Distinción' => 'Distinción'
        ];
        ?>

    <?= $form->field($model, 'tipo')->dropDownList($tipoOptions, ['prompt' => 'Seleccione el tipo']) ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;', 'placeholder' => 'Máximo 255 caracteres']) ?>

    <?= $form->field($model, 'dependencia')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

    <?= $form->field($model, 'anio')->textInput([
        'maxlength' => true,
        'placeholder' => 'AAAA',
        'pattern' => '\d{4}',
        'title' => 'Debe ser un año valido'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
