<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
                <!-- Collapsible Navbar -->
                <div class="collapse navbar-collapse" id="production_nav">
                    <ul class="nav navbar-nav">
                        <li>
                            <?= Html::a('Articulos', Url::to(['articulos/index']), ['style' => 'font-weight: bold; ']) ?>
                        </li>

                        <li>
                            <?= Html::a('Capitulos', Url::to(['capitulos/index']), ['style' => 'font-weight: bold; ']) ?>
                        </li>

                        <li>
                            <?= Html::a('Libros', Url::to(['investigations/index']), ['style' => 'font-weight: bold; ']) ?>
                        </li>

                        <li>
                            <?= Html::a('Ponencias', Url::to(['ponencias/index']), ['style' => 'font-weight: bold; ']) ?>
                        </li>

                        <li>
                            <?= Html::a('Tesis', Url::to(['tesis/index']), ['style' => 'font-weight: bold; ']) ?>
                        </li>
                    </ul>
                </div>
    </div>
</nav>