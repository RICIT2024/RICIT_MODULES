<?php

use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use ricit\humhub\modules\test\models\Ponencias;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Registros';
$this->params['breadcrumbs'][] = $this->title;

$ponenciaModel = new Ponencias();

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\test\assets\Assets::register($this);

?>

<div class="container-fluid">
    <div class="panel panel-default">
        
        <?= $this->render('@test/views/layouts/nav-header', []) ?>

        <div class="panel-body">
            <div id="row one">
                <p style="text-align: center; font-weight:bold;"><?= Yii::t('TestModule.base', 'Producción Cientifica Total.') ?></p>
                <div style="display: flex; gap:25px; justify-content:center; align-items:center; flex-wrap: wrap;" id="Values">
        
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $model->getPonenciasTotal(); ?> </p>
                        <h6>Ponencia</h6>
                    </div>
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $model->getArticulosTotal(); ?></p>
                        <h6>Articulos</h6>
                    </div>
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $model->getLibrosTotal(); ?></p>
                        <h6>Libros</h6>
                    </div>
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $model->getCapitulosTotal(); ?></p>
                        <h6>Capitulos</h6>
                    </div>
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $model->getTesisTotal(); ?></p>
                        <h6>Tesis</h6>
                    </div>
                
                </div>
            </div>
            <br>
            <div id="row two">
                <p style="text-align: center; font-weight:bold;"><?= Yii::t('TestModule.base', 'Ponencias Por Tipo.') ?></p>
                <div style="display: flex; gap:25px; justify-content:center; align-items:center; flex-wrap: wrap;" id="Values">
        
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $ponenciaModel->getTotalCongreso(); ?> </p>
                        <h6>Congreso</h6>
                    </div>
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $ponenciaModel->getTotalSimposio(); ?></p>
                        <h6>Simposio</h6>
                    </div>
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $ponenciaModel->getTotalForo(); ?></p>
                        <h6>Foro</h6>
                    </div>
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $ponenciaModel->getTotalSeminario(); ?></p>
                        <h6>Seminario</h6>
                    </div>
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $ponenciaModel->getTotalPanel(); ?></p>
                        <h6>Panel</h6>
                    </div>
                    <div style="width:100px; display: flex; flex-direction: column; justify-content:space-around; align-items:center; background-color: #fff; border: 0.2rem solid; padding:5px; border-radius: 10px;">
                        <i class="fa fa-book"></i>    
                        <p> <?= $ponenciaModel->getTotalOtro(); ?></p>
                        <h6>Otro</h6>
                    </div>
                
                </div>
            </div>    
                
            <div>
                    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
                        <?= Html::encode($this->title) ?>
                    </h1>           

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?php   
                        echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' =>[
                            [            
                                // you may configure additional properties here
                                'attribute' => 'P_id',
                                'label' =>'ID',
                                'headerOptions'=>[ 'style'=>'background-color:#BC955C; width:5%; text-align:center;' ]
                            ],
                            [            
                                // you may configure additional properties here
                                'attribute' => 'Autor',
                                'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align:center;' ]
                            ],
                            [            
                            // you may configure additional properties here
                            'attribute' => 'Anio',
                            'label' =>'Año',
                            'headerOptions'=>[ 'style'=>'background-color:#BC955C; width: 7%; text-align:center;' ]
                            ],
                            [            
                                // you may configure additional properties here
                                'attribute' => 'Titulo',
                                'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align:center;' ]
                            ],
                            [            
                            // you may configure additional properties here
                            'attribute' => 'Resumen',
                            'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align:center;' ]
                            ],
                            [            
                                // you may configure additional properties here
                                'attribute' => 'Tipo',
                                'headerOptions'=>[ 'style'=>'background-color:#BC955C; width:8%; text-align:center;' ]
                                ],
                        ],
                        ]);

                    ?>

            </div>
        
        </div>
    </div>
</div>