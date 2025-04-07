<?php

use yii\helpers\Html;
use yii\helpers\Url;
use ricit\humhub\modules\test\models\Ponencias;

/** @var yii\web\View $this */
/** @var ricit\humhub\modules\test\models\ScientificProduction $model */

$this->title = 'Registros';
$this->params['breadcrumbs'][] = $this->title;

// Registrar los assets del módulo
\ricit\humhub\modules\test\assets\Assets::register($this);

?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="row one">
                <p style="text-align: center; font-weight:bold;">
                    <?= Yii::t('TestModule.base', 'Producción Científica Total.') ?>
                </p>
                <div style="display: flex; gap:25px; justify-content:center; align-items:center; flex-wrap: wrap;" id="Values">

                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>
                        <p><?= $model->getPonenciasTotal(); ?></p>
                        <?= Html::a('Ponencias', Url::to(['ponencias/index']), ['style' => 'font-weight: bold;']) ?>
                    </div>

                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>
                        <p><?= $model->getArticulosTotal(); ?></p>
                        <?= Html::a('Artículos', Url::to(['articulos/index']), ['style' => 'font-weight: bold;']) ?>
                    </div>

                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>
                        <p><?= $model->getLibrosTotal(); ?></p>
                        <?= Html::a('Libros', Url::to(['investigations/index']), ['style' => 'font-weight: bold;']) ?>
                    </div>

                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>
                        <p><?= $model->getCapitulosTotal(); ?></p>
                        <?= Html::a('Capítulos', Url::to(['capitulos/index']), ['style' => 'font-weight: bold;']) ?>
                    </div>

                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>
                        <p><?= $model->getTesisTotal(); ?></p>
                        <?= Html::a('Tesis', Url::to(['tesis/index']), ['style' => 'font-weight: bold;']) ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
