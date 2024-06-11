<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tesis $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tesis-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
        <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>

        <div class="row">
            <span class="col-md-6 col-sm-6">
                <?= $form->field($model, 'Autor')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'Grado_academico')->dropDownList($model->getOptions(), ['prompt' => 'Selecciona el grado académico'] ) ?>

                <?= $form->field($model, 'Institucion_procedencia')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>
            </span>

            <span class="col-md-6 col-sm-6">
                <?= $form->field($model, 'Anio')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'AAAA ',
                    'pattern' => '\d{4}',
                    'title' => 'Debe ser un año valido'
                
                ]) ?>

                <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'Pais')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>
            </span>
        </div>
    
    </div>


    <div class="form-group" style="margin-left: 10px; padding-bottom:10px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
