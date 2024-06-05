<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Articulos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="articulos-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
        <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>
        <div class="row">

        <span class="col-md-6 col-sm-6">
            <?= $form->field($model, 'Autor')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

            <?= $form->field($model, 'Autores')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

            <?= $form->field($model, 'Anio')->textInput([
                'maxlength' => true,
                'placeholder' => 'AAAA ',
                'pattern' => '\d{4}',
                'title' => 'Debe ser un año valido'
                ]) ?>

            <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

            <?= $form->field($model, 'Resumen')->textarea(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

            <?= $form->field($model, 'Revista')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>
        </span>

        <span class="col-md-6 col-sm-6">
            <?= $form->field($model, 'Pais')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

            <?= $form->field($model, 'Idioma')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

            <?= $form->field($model, 'URL')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'DOI')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'Palabras_clave')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>
        </span>
     </div>
    </div>

    <div class="form-group" style="margin-left: 10px; padding-bottom:10px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
