<?php

namespace ricit\humhub\modules\software\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\software\models\software;

/**
 * SearchS represents the model behind the search form of `app\models\software`.
 */
class SearchS extends software
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Software_id', 'User_id'], 'integer'],
            [['autor', 'anio_publicacion', 'titulo', 'sistema', 'descripcion', 'disponible'], 'safe'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param int $User_id El ID del usuario para el cual se buscarán las certificaciones
     *
     * @return ActiveDataProvider
     */
    public function search($params, $User_id )
    {
        // Utiliza la relación 'user' para traer el nombre y apellido en lugar del ID de usuario
        $query = software::find()->where(['User_id' => $User_id])->with('user');

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        // Carga los parámetros de búsqueda y valida
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Software_id' => $this->Software_id,
            'User_id' => $this->User_id,
            'anio_publicacion' => $this->anio_publicacion,
        ]);

        $query->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'sistema', $this->sistema])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'disponible', $this->disponible]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchAll($params)
    {
        // Utiliza la relación 'user' para traer el nombre y apellido en lugar del ID de usuario
        $query = software::find();

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        // Carga los parámetros de búsqueda y valida
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Software_id' => $this->Software_id,
            'User_id' => $this->User_id,
            'anio_publicacion' => $this->anio_publicacion,
        ]);

        $query->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'sistema', $this->sistema])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'disponible', $this->disponible]);

        return $dataProvider;
    }
}
