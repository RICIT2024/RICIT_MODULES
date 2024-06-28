<?php

namespace ricit\humhub\modules\test\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class SearchM extends Model
{
    public $term;

    public function rules()
    {
        return [
            [['term'], 'safe'],
        ];
    }

    public function search($params)
    {
        $this->load($params);

        if (!$this->validate()) {
            return [
                'libros' => null,
                'capLibros' => null,
                'articulos' => null,
                'ponencias' => null,
                'tesis' => null,
            ];
        }

        $term = $this->term;

        // Función para filtrar y eliminar valores null
        $filterNull = function ($query, $column, $value) {
            if (!empty($value)) {
                $query->orWhere(['like', $column, $value]);
            }
        };

        $librosQuery = (new Query())
            ->select('*')
            ->from('libros');
        $filterNull($librosQuery, 'Titulo', $term);
        $filterNull($librosQuery, 'Resumen', $term);
        $filterNull($librosQuery, 'Autor', $term);

        $capLibrosQuery = (new Query())
            ->select('*')
            ->from('cap_libros');
        $filterNull($capLibrosQuery, 'Titulo_capitulo', $term);
        $filterNull($capLibrosQuery, 'Resumen', $term);
        $filterNull($capLibrosQuery, 'Autor_libro', $term);
        $filterNull($capLibrosQuery, 'Autores_capitulo', $term);

        $articulosQuery = (new Query())
            ->select('*')
            ->from('articulos');
        $filterNull($articulosQuery, 'Titulo', $term);
        $filterNull($articulosQuery, 'Resumen', $term);
        $filterNull($articulosQuery, 'Autor', $term);
        $filterNull($articulosQuery, 'Autores', $term);

        $ponenciasQuery = (new Query())
            ->select('*')
            ->from('ponencias');
        $filterNull($ponenciasQuery, 'Titulo_ponencia', $term);
        $filterNull($ponenciasQuery, 'Resumen', $term);
        $filterNull($ponenciasQuery, 'Autor', $term);

        $tesisQuery = (new Query())
            ->select('*')
            ->from('tesis');
        $filterNull($tesisQuery, 'Titulo', $term);
        $filterNull($tesisQuery, 'Autor', $term);

        return [
            'libros' => new ActiveDataProvider(['query' => $librosQuery]),
            'capLibros' => new ActiveDataProvider(['query' => $capLibrosQuery]),
            'articulos' => new ActiveDataProvider(['query' => $articulosQuery]),
            'ponencias' => new ActiveDataProvider(['query' => $ponenciasQuery]),
            'tesis' => new ActiveDataProvider(['query' => $tesisQuery]),
        ];
    }
}
