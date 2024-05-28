<?php

namespace ricit\humhub\modules\certifi\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\certifi\models\Certifi;

/**
 * SearchCert representa el modelo detrás del formulario de búsqueda de `app\models\certifi`.
 */
class SearchCert extends Certifi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Certificacion_id', 'User_id', 'Vigencia'], 'integer'],
            [['Nombre_cert', 'Institución'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Crea una instancia de proveedor de datos con la consulta de búsqueda aplicada
     *
     * @param array $params
     * @param int $User_id El ID del usuario para el cual se buscarán las certificaciones
     * @return ActiveDataProvider
     */
    public function search($params, $User_id)
    {
        // Utiliza la relación 'user' para traer el nombre y apellido en lugar del ID de usuario
        $query = Certifi::find()->where(['User_id' => $User_id])->with('user');

        // Crea un nuevo proveedor de datos con la consulta
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Carga los parámetros de búsqueda y valida
        $this->load($params);

        if (!$this->validate()) {
            // Si la validación falla, puedes decidir retornar un dataProvider vacío
            // o mostrar todos los registros sin filtrar
            // $query->where('0=1');
            return $dataProvider;
        }

        // Aplica los filtros a la consulta
        $query->andFilterWhere([
            'Certificacion_id' => $this->Certificacion_id,
            'User_id' => $this->User_id,
            'Vigencia' => $this->Vigencia,
        ]);

        $query->andFilterWhere(['like', 'Nombre_cert', $this->Nombre_cert])
              ->andFilterWhere(['like', 'Institución', $this->Institución]);

        // Retorna el proveedor de datos
        return $dataProvider;
    }

    /**
     * Busca todas las certificaciones sin filtrar por usuario
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchAll($params)
    {
        // Crea una consulta para buscar todas las certificaciones
        $query = Certifi::find();

        // Crea un proveedor de datos con la consulta
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Carga y valida los parámetros de búsqueda
        $this->load($params);

        if (!$this->validate()) {
            // Si la validación falla, puedes decidir retornar un dataProvider vacío
            // o mostrar todos los registros sin filtrar
            // $query->where('0=1');
            return $dataProvider;
        }

        // Aplica los filtros a la consulta
        $query->andFilterWhere([
            'Certificacion_id' => $this->Certificacion_id,
            'User_id' => $this->User_id,
            'Vigencia' => $this->Vigencia,
        ]);

        $query->andFilterWhere(['like', 'Nombre_cert', $this->Nombre_cert])
              ->andFilterWhere(['like', 'Institución', $this->Institución]);

        // Retorna el proveedor de datos
        return $dataProvider;
    }
}
