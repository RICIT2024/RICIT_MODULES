<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\grid\GridView;    
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('UserModule.profile', '<strong>Recursos Humano</strong> By User') ?>
    </div>

<?php   
   echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' =>[
         [            
             // you may configure additional properties here
             'attribute' => 'Autor',
             'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
         ],
         [            
            // you may configure additional properties here
            'attribute' => 'Grado_academico', 
            'label' => 'Grado academico',
            'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
        ],
        [            
            // you may configure additional properties here
            'attribute' => 'Institucion_procedencia',
            'label' => 'Institución',
            'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
        ],
        [            
         // you may configure additional properties here
         'attribute' => 'Anio',
         'label' =>'Año',
         'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
         ],
         [            
            // you may configure additional properties here
            'attribute' => 'Titulo',
            'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
        ],
        [            
         // you may configure additional properties here
         'attribute' => 'Pais',
         'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
         ],
      ],
     ]);

?>
</div>