<?php

use humhub\widgets\Button;
use humhub\widgets\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Búsqueda de producción científica';
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(['method' => 'get']); ?>
        <div class="form-group">
            <?= $form->field($searchModel, 'term')->textInput(['placeholder' => 'Ingrese términos de búsqueda'])->label('Buscar:') ?>
            <?= Button::primary(Yii::t('base', 'Buscar'))->submit() ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php if (isset($dataProviders)): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Libros</strong>
        </div>
        <div class="panel-body"> 
            <?= GridView::widget([
                'dataProvider' => $dataProviders['libros'],
                'columns' => [
                    'Autor',
                    'Titulo',
                    'Anio',
                    'Resumen',
                    'Editorial',
                    'ISBN',
                    // Agrega más columnas según sea necesario
                ],
            ]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Capítulos de Libros</strong>
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProviders['capLibros'],
                'columns' => [
                    'Autor_libro',
                    'Titulo_capitulo',
                    'Anio',
                    'Resumen',
                    'Editores',
                    'ISBN',
                    // Agrega más columnas según sea necesario
                ],
            ]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Artículos</strong>
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProviders['articulos'],
                'columns' => [
                    'Autor',
                    'Titulo',
                    'Anio',
                    'Resumen',
                    'Revista',
                    'Pais',
                    // Agrega más columnas según sea necesario
                ],
            ]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Ponencias</strong>
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProviders['ponencias'],
                'columns' => [
                    'Autor',
                    'Titulo_ponencia',
                    'Anio',
                    'Resumen',
                    'Titulo_evento',
                    'País',
                    // Agrega más columnas según sea necesario
                ],
            ]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Tesis</strong>
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProviders['tesis'],
                'columns' => [
                    'Autor',
                    'Titulo',
                    'Anio',
                    'Resumen',
                    'Grado_academico',
                    'Institucion_procedencia',
                    // Agrega más columnas según sea necesario
                ],
            ]) ?>
        </div>
    </div>
<?php endif; ?>
