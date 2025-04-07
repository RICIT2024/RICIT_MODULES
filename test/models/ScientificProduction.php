<?php

namespace ricit\humhub\modules\test\models;

use ricit\humhub\modules\test\models\Ponencias;
use ricit\humhub\modules\test\models\Libros;
use ricit\humhub\modules\test\models\CapLibros;
use ricit\humhub\modules\test\models\Articulos;
use ricit\humhub\modules\test\models\Tesis;

class ScientificProduction extends \yii\base\Model
{
    // Métodos para obtener conteos directamente desde cada tabla real

    public function getArticulosTotal()
    {
        return Articulos::find()->count();
    }

    public function getLibrosTotal()
    {
        return Libros::find()->count();
    }

    public function getCapitulosTotal()
    {
        return CapLibros::find()->count();
    }

    public function getPonenciasTotal()
    {
        return Ponencias::find()->count();
    }

    public function getTesisTotal()
    {
        return Tesis::find()->count();
    }
}
