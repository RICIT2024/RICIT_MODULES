<?php

use PhpParser\Node\Stmt\Label;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var ricit\humhub\modules\test\models\Libros $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">

        <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>
        
        <div class="row">
            <span class="col-md-6">
                <?= $form->field($model, 'Autor')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'Autores_sec')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'Anio')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'AAAA ',
                    'pattern' => '\d{4}',
                    'title' => 'Debe ser un año valido'
                ]) ?>

                <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'Resumen')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;', 'placeholder' => 'Máximo 255 caracteres']) ?>

            </span>

            <span class="col-md-6">
                <?= $form->field($model, 'ISBN')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Formato')->dropDownList($model->getFormato(), ['prompt' => 'Selecciona el Tipo de Libro'] ) ?>

                <?= $form->field($model, 'Editorial')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'URL')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Palabras_clave')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>
            </span>
        </div>
    </div>

    <div class="form-group" style="margin-left: 10px; padding-bottom:10px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
