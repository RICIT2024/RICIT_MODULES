<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>User form</strong> <?= Yii::t('UsermessageModule.base', 'configuration') ?></div>

        <div class="panel-body">
            <p><?= Yii::t('UsermessageModule.base', 'Welcome to the admin only area.') ?></p>
            <?php
            use yii\grid\GridView;
   
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' =>[
                    [            
                        // you may configure additional properties here
                        'attribute' => 'id',
                        'headerOptions'=>[ 'style'=>'background-color:#691C32;' ]
                    ],
                    [            
                        // you may configure additional properties here
                        'attribute' => 'name',
                        'headerOptions'=>[ 'style'=>'background-color:#ccf8fe' ]
                    ],
                    [            
                    // you may configure additional properties here
                    'attribute' => 'email',
                    'headerOptions'=>[ 'style'=>'background-color:#ccf8fe' ]
                    ],
                    [            
                        // you may configure additional properties here
                        'attribute' => 'title',
                        'headerOptions'=>[ 'style'=>'background-color:#ccf8fe' ]
                    ],
                    [            
                        // you may configure additional properties here
                        'attribute' => 'content',
                        'headerOptions'=>[ 'style'=>'background-color:#ccf8fe' ]
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>