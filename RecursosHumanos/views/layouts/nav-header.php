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
                            <?= Html::a('Docencia', Url::to(['docencia/index']), ['style' => 'font-weight: bold; text-align: center; ']) ?>
                        </li>
                    </ul>
                </div>
    </div>
</nav>