<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\patentes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="patentes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
        <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>

        <?php
        $eventoOptions = [
            'En Solicitud' => 'En solicitud',
            'Otorgamiento' => 'Otorgamiento',

        ];
        ?>

        <div class="row">
            <span class="col-md-6 col-sm-6">

                <?= $form->field($model, 'autor')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'titulo_invencion')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'estatus_invencion')->dropDownList($eventoOptions, ['prompt' => 'Seleccione el estatus de la invención'])?>
            </span>

            <span class="col-md-6 col-sm-6">
                <?= $form->field($model, 'anio_estatus')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'AAAA',
                    'pattern' => '\d{4}',
                    'title' => 'Debe ser un año valido con el formato AAAA'
                    ]) ?>

                <?= $form->field($model, 'clasificacion')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'asignatario')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>
            </span>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
