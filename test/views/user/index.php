<?php
    use ricit\humhub\modules\test\models\ScientificProduction;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\grid\ActionColumn;
    use yii\grid\GridView;
    use yii\db\Query;
    
    
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('UserModule.profile', '<strong>Producción Cientifica</strong>') ?>
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
         'attribute' => 'Anio',
         'label' =>'Año',
         'headerOptions'=>[ 'style'=>'background-color:#BC955C; width:6%; text-align: center;' ]
         ],
         [            
            // you may configure additional properties here
            'attribute' => 'Titulo',
            'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
        ],
        [            
         // you may configure additional properties here
         'attribute' => 'Resumen',
         'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
         ],
         [            
            // you may configure additional properties here
            'attribute' => 'Tipo',
            'headerOptions'=>[ 'style'=>'background-color:#BC955C; width:8%; text-align: center;' ]
         ],
      ],
     ]);

?>
</div>