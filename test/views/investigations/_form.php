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
                <?= $form->field($model, 'Autor')->textInput(['onchange' => 'this.value = this.value.toUpperCase();'],['maxlength' => true, 'placeholder'=>'John Doe']) ?>

                <?= $form->field($model, 'Autores_sec')->textInput(['onchange' => 'this.value = this.value.toUpperCase();'],['maxlength' => true, 'placeholder'=>'Jane Smith Garza']) ?>

                <?= $form->field($model, 'Anio')->textInput(['placeholder'=>2020]) ?>

                <?= $form->field($model, 'Titulo')->textInput(['onchange' => 'this.value = this.value.toUpperCase();'],['maxlength' => true, 'placeholder'=>'Sample Book']) ?>

                <?= $form->field($model, 'Resumen')->textInput(['maxlength' => true, 'placeholder'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a felis et ligula fermentum ultrices sit amet non sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;']) ?>

            </span>

            <span class="col-md-6">
                <?= $form->field($model, 'ISBN')->textInput(['maxlength' => true, 'placeholder'=>'0-7645-2641-3']) ?>

                <?= $form->field($model, 'Formato')->dropDownList($model->getFormato(), ['prompt' => 'Select Tipo'] ) ?>

                <?= $form->field($model, 'Editorial')->textInput(['maxlength' => true, 'placeholder'=>'Sample Publisher']) ?>

                <?= $form->field($model, 'URL')->textInput(['maxlength' => true, 'placeholder'=>'http://sampleurl.com/article']) ?>

                <?= $form->field($model, 'Palabras_clave')->textInput(['maxlength' => true, 'placeholder'=>'Research, science']) ?>
            </span>
        </div>
    </div>

    <div class="form-group" style="margin-left: 10px; padding-bottom:10px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
