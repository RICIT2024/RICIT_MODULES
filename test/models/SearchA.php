<?php

namespace ricit\humhub\modules\test\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SearchA represents el modelo para Articulos.
 */
class SearchA extends Articulos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Articulos_id', 'User_id', 'Anio'], 'integer'],
            [['Autor', 'Autores', 'Titulo', 'Resumen', 'Revista', 'Pais', 'Idioma', 'ISSNs', 'URL', 'DOI', 'Palabras_clave'], 'safe'],
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
        $query = Articulos::find()->where(['User_id'=> $User_id]);

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
            'Articulos_id' => $this->Articulos_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Autor', $this->Autor])
            ->andFilterWhere(['like', 'Autores', $this->Autores])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Resumen', $this->Resumen])
            ->andFilterWhere(['like', 'Revista', $this->Revista])
            ->andFilterWhere(['like', 'Pais', $this->Pais])
            ->andFilterWhere(['like', 'Idioma', $this->Idioma])
            ->andFilterWhere(['like', 'ISSNs', $this->ISSNs])
            ->andFilterWhere(['like', 'URL', $this->URL])
            ->andFilterWhere(['like', 'DOI', $this->DOI])
            ->andFilterWhere(['like', 'Palabras_clave', $this->Palabras_clave]);

        return $dataProvider;
    }

    public function searchAll($params)
    {
        $query = Articulos::find();

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
            'Articulos_id' => $this->Articulos_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Autor', $this->Autor])
            ->andFilterWhere(['like', 'Autores', $this->Autores])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Resumen', $this->Resumen])
            ->andFilterWhere(['like', 'Revista', $this->Revista])
            ->andFilterWhere(['like', 'Pais', $this->Pais])
            ->andFilterWhere(['like', 'Idioma', $this->Idioma])
            ->andFilterWhere(['like', 'ISSNs', $this->ISSNs])
            ->andFilterWhere(['like', 'URL', $this->URL])
            ->andFilterWhere(['like', 'DOI', $this->DOI])
            ->andFilterWhere(['like', 'Palabras_clave', $this->Palabras_clave]);

        return $dataProvider;
    }



}
