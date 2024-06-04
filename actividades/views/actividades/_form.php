<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\actividades $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="actividades-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
    <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?> 

    <?= $form->field($model, 'Dependencia')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

    <?= $form->field($model, 'Anio_ingreso')->textInput([
             'maxlength' => true,
             'placeholder' => 'AAAA',
             'pattern' => '\d{4}',
             'title' => 'Debe ser un año valido'

    ]) ?>

    <?= $form->field($model, 'Fecha')->textInput([
            'maxlength' => true,
            'placeholder' => 'AAAA-MM-DD',
            'pattern' => '\d{4}-\d{2}-\d{2}',
            'title' => 'Debe ser una fecha con el formato AAAA-MM-DD'
        ]) ?>

    <?= $form->field($model, 'URL')->textInput(['maxlength' => true, 'placeholder' => 'www.ejemplo.com']) ?>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
