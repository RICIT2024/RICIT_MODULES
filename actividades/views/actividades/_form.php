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

    <?= $form->field($model, 'Dependencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Anio_ingreso')->textInput() ?>

    <?= $form->field($model, 'Fecha')->textInput(['placeholder' => 'aaaa-mm-dd']) ?>

    <?= $form->field($model, 'URL')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
