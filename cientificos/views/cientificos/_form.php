<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\cientificos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cientificos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>

    <?php
        $eventoOptions = [
            'Coloquio' => 'Coloquio',
            'Congreso' => 'Congreso',
            'Convención' => 'Convención',
            'Encuentro' => 'Encuentro',
            'Foro' => 'Foro',
            'Simposio' => 'Simposio',
            'Jornada' => 'Jornada',
            'Mesa Redonda' => 'Mesa redonda',
            'Panel' => 'Panel'

        ];
        ?>
    <?php
        $participacionOptions = [
            'Ponente' => 'Ponente',
            'Conferencia magistral' => 'Conferencia magistral',
            'Comité organizacional' => 'Comité organizacional'
        ];
        ?>

    <?= $form->field($model, 'Evento')->dropDownList($eventoOptions, ['prompt' => 'Seleccione el tipo de evento']) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

    <?= $form->field($model, 'Participación')->dropDownList($participacionOptions, ['prompt' => 'Seleccione el tipo de participación']) ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

    <?= $form->field($model, 'Anio')->textInput([
        'maxlength' => true,
        'placeholder' => 'AAAA',
        'pattern' => '\d{4}',
        'title' => 'Debe ser un año valido'
        
        ])  ?>

    <?= $form->field($model, 'Pais')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
