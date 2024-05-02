<?php

namespace ricit\humhub\modules\test\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SearchSP represents the model behind the search form of `app\models\Libros`.
 */
class SearchSP extends Libros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Libro_id', 'User_id', 'Anio'], 'integer'],
            [['Autor', 'Autores_sec', 'Titulo', 'Resumen', 'Editorial', 'ISBN', 'Formato', 'URL', 'Palabras_clave'], 'safe'],
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
     *
     * @return ActiveDataProvider
     */
    public function search($params, $User_id)
    {
        $query = Libros::find()->where(['User_id'=> $User_id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Libro_id' => $this->Libro_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Autor', $this->Autor])
            ->andFilterWhere(['like', 'Autores_sec', $this->Autores_sec])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Resumen', $this->Resumen])
            ->andFilterWhere(['like', 'Editorial', $this->Editorial])
            ->andFilterWhere(['like', 'ISBN', $this->ISBN])
            ->andFilterWhere(['like', 'Formato', $this->Formato])
            ->andFilterWhere(['like', 'URL', $this->URL])
            ->andFilterWhere(['like', 'Palabras_clave', $this->Palabras_clave]);

        return $dataProvider;
    }

    public function searchAll($params)
    {
        $query = Libros::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Libro_id' => $this->Libro_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Autor', $this->Autor])
            ->andFilterWhere(['like', 'Autores_sec', $this->Autores_sec])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Resumen', $this->Resumen])
            ->andFilterWhere(['like', 'Editorial', $this->Editorial])
            ->andFilterWhere(['like', 'ISBN', $this->ISBN])
            ->andFilterWhere(['like', 'Formato', $this->Formato])
            ->andFilterWhere(['like', 'URL', $this->URL])
            ->andFilterWhere(['like', 'Palabras_clave', $this->Palabras_clave]);

        return $dataProvider;
    }
}
