<?php

namespace ricit\humhub\modules\test\controllers;

use humhub\modules\admin\components\Controller;
use ricit\humhub\modules\test\models\ScientificProduction;

class AdminController extends Controller
{
    /**
     * Muestra la vista de administración con totales de producción científica.
     */
    public function actionIndex()
    {
        $model = new ScientificProduction();

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
