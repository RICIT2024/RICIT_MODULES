<?php

use humhub\widgets\Button;
use humhub\widgets\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Materiales diversos sobre el conocimiento turístico.';

?>
<head>
<title><?= Html::encode($this->title) ?></title>

</head>
<div class="panel panel-default">
    <div class="panel-heading text-center">
        <h2><?= Html::encode($this->title) ?> <br>¡Encuéntralos aquí! </h2><br>
        <p>Encuentra libros, artículos, ponenecias y tesis que abordan el turismo desde diversas perspectivas. 
            Esta sección está diseñada para estudiantes y profesionales que buscan ampliar su conocimiento. Accede a recursos actualizados
            y de facil consulta para fortalecer tu aprendizaje.
        </p>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6 text-center">
                <h3>Materiales académicos y científicos sobre el turismo<br>¡Encuéntralos aquí!</h3>
                <p>Accede a estudios e investigaciones sobre turismo  con rigor académico. Encuentra información científica, metodológica y actualizada.
                    Profundiza en diversos temas según los enfoques de cada autor.
                </p>
                <?php $form = ActiveForm::begin(['method' => 'get']); ?>
                <?= $form->field($searchModel, 'term')->textInput([
                    'placeholder' => 'Autor(es), título, palabras clave, resumen...', 
                    'style' => 'border: 2px solid #611232;', 
                    'class' => 'form-control input-lg'])->label(false) ?>
                <?= Html::hiddenInput('searchType', 'scientific') ?>
                <?= Button::primary(Yii::t('base', 'Buscar'), ['class' => 'btn btn-primary'])->submit() ?>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-6 text-center">
                <h3>Acércate a los expertos<br>¡Encuéntralos aquí! </h3>
                <p>Explora los estudios de expertos en turismo, aprende de sus aportaciones y conecta con profesionales del sector para generar nuevas sinergias.</p> <br>
                <?php $form = ActiveForm::begin(['method' => 'get']); ?>
                <?= $form->field($searchModel, 'term')->textInput(['placeholder' => 'Datos personales, áreas de especialidad, correo electrónico...', 'style' => 'border: 2px solid #611232;', 'class' => 'form-control input-lg'])->label(false) ?>
                <?= Html::hiddenInput('searchType', 'experts') ?>
                <?= Button::primary(Yii::t('base', 'Buscar'), ['class' => 'btn btn-primary'])->submit() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php if ($dataProviders): ?>
    <?php if (isset($dataProviders['libros'])): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Libros</strong>
            </div>
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProviders['libros'],
                    'columns' => [
                        ['attribute' => 'Autor', 'label' => 'Autor Principal'],
                        ['attribute' => 'Autores_sec', 'label' => 'Autores Secundarios'],
                        ['attribute' => 'Titulo', 'label' => 'Título'],
                        ['attribute' => 'Resumen', 'label' => 'Resumen'],
                        ['attribute' => 'Palabras_clave', 'label' => 'Palabras Clave'],
                        ['attribute' => 'URL', 'label' => 'Enlace'],
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
                        ['attribute' => 'Autor_libro', 'label' => 'Autor del Libro'],
                        ['attribute' => 'Titulo_libro', 'label' => 'Título del Libro'],
                        ['attribute' => 'Autores_capitulo', 'label' => 'Autores del Capítulo'],
                        ['attribute' => 'Titulo_capitulo', 'label' => 'Título del Capítulo'],
                        ['attribute' => 'Resumen', 'label' => 'Resumen'],
                        ['attribute' => 'Paginas', 'label' => 'Páginas'],
                        ['attribute' => 'URL', 'label' => 'Enlace'],
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
                        ['attribute' => 'Autor', 'label' => 'Autor Principal'],
                        ['attribute' => 'Autores', 'label' => 'Autores'],
                        ['attribute' => 'Titulo', 'label' => 'Título'],
                        ['attribute' => 'Resumen', 'label' => 'Resumen'],
                        ['attribute' => 'Revista', 'label' => 'Revista'],
                        ['attribute' => 'URL', 'label' => 'Enlace'],
                        ['attribute' => 'Palabras_clave', 'label' => 'Palabras Clave'],
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
                        ['attribute' => 'Autor', 'label' => 'Autor'],
                        ['attribute' => 'Titulo_evento', 'label' => 'Título del Evento'],
                        ['attribute' => 'Titulo_ponencia', 'label' => 'Título de la Ponencia'],
                        ['attribute' => 'Tipo', 'label' => 'Tipo'],
                        ['attribute' => 'Resumen', 'label' => 'Resumen'],
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
                        ['attribute' => 'Autor', 'label' => 'Autor'],
                        ['attribute' => 'Titulo', 'label' => 'Título'],
                        ['attribute' => 'Grado_academico', 'label' => 'Grado Académico'],
                        ['attribute' => 'Institucion_procedencia', 'label' => 'Institución de Procedencia'],
                        ['attribute' => 'Anio', 'label' => 'Año'],
                    ],
                ]) ?>
            </div>
        </div>
    <?php elseif (isset($dataProviders['experts'])): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Acércate a los expertos</strong>
            </div>
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProviders['experts'],
                    'columns' => [
                        ['attribute' => 'firstname', 'label' => 'Nombre'],
                        ['attribute' => 'lastname', 'label' => 'Apellido'],
                        ['attribute' => 'aboutme', 'label' => 'Áreas de especialización'],
                        ['attribute' => 'correocont', 'label' => 'Correo electrónico'],
                    ],
                ]) ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
