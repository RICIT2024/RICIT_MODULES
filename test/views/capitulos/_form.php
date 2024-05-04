<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CapLibros $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cap-libros-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
        <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>
        
        <div class="row">

            <span class="col-md-6">
                <?= $form->field($model, 'Anio')->textInput() ?>

                <?= $form->field($model, 'Titulo_capitulo')->textInput(['maxlength' => true],) ?>

                <?= $form->field($model, 'Autor_libro')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Autores_capitulo')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Formato')->dropDownList($model->getFormato(), ['prompt' => 'Select Tipo'] ) ?>

                <?= $form->field($model, 'Resumen')->textInput(['maxlength' => true, 'placeholder'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.']) ?>
            </span>

            <span class="col-md-6">
                <?= $form->field($model, 'Paginas')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Titulo_libro')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Editores')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'ISBN')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'URL')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Palabras_clave')->textInput(['maxlength' => true]) ?>
            </span>
        </div>
    </div>
    
    <div class="form-group" style="margin-left: 10px; padding-bottom:10px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
