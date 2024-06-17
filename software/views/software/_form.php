<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\software $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="software-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid, 'readonly' => true, 'style' => 'text-transform: uppercase;']) ?>

        <?php
        $disponibleOptions = [
            'Si' => 'Si',
            'No' => 'No',

        ];
        ?>
        
        <?php
        $SistemOptions = [
            'Linux' => 'Linux',
            'Windows' => 'Windows',
            'ios' => 'iOS',

        ];
        ?>

    <?= $form->field($model, 'autor')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

    <?= $form->field($model, 'anio_publicacion')->textInput([
        'maxlength' => true,
            'style' => 'text-transform: uppercase;',
            'placeholder' => 'AAAA ',
            'pattern' => '\d{4}',
            'title' => 'Debe ser un año valido'
    ]) ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

    <?= $form->field($model, 'sistema')->dropDownList($SistemOptions, ['prompt' => 'Seleccione el Sistema Operativo'])?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

    <?= $form->field($model, 'disponible')->dropDownList($disponibleOptions, ['prompt' => 'Seleccione la disponibilidad'])?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
