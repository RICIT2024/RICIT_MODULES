<?php

namespace ricit\humhub\modules\test\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SearchC represents the model behind the search form of `app\models\CapLibros`.
 */
class SearchC extends CapLibros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Cap_id', 'User_id', 'Anio'], 'integer'],
            [['Titulo_capitulo', 'Resumen', 'Paginas', 'Titulo_libro', 'Editores', 'ISBN', 'URL', 'Autor_libro','Autores_capitulo', 'Formato','Palabras_clave'], 'safe'],
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
        $query = CapLibros::find()->where(['User_id'=> $User_id]);

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
            'Cap_id' => $this->Cap_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Titulo_capitulo', $this->Titulo_capitulo])
            ->andFilterWhere(['like', 'Resumen', $this->Resumen])
            ->andFilterWhere(['like', 'Autor_libro ', $this->Autor_libro])
            ->andFilterWhere(['like', 'Autores_capitulo ', $this->Autores_capitulo])
            ->andFilterWhere(['like', 'Paginas', $this->Paginas])
            ->andFilterWhere(['like', 'Titulo_libro', $this->Titulo_libro])
            ->andFilterWhere(['like', 'Editores', $this->Editores])
            ->andFilterWhere(['like', 'ISBN', $this->ISBN])
            ->andFilterWhere(['like', 'URL', $this->URL])
            ->andFilterWhere(['like', 'Palabras_clave', $this->URL])
            ->andFilterWhere(['like', 'Formato', $this->URL]);


        return $dataProvider;
    }

    public function searchAll($params)
    {
        $query = CapLibros::find();

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
            'Cap_id' => $this->Cap_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Titulo_capitulo', $this->Titulo_capitulo])
            ->andFilterWhere(['like', 'Resumen', $this->Resumen])
            ->andFilterWhere(['like', 'Autor_libro ', $this->Autor_libro])
            ->andFilterWhere(['like', 'Autores_capitulo ', $this->Autores_capitulo])
            ->andFilterWhere(['like', 'Paginas', $this->Paginas])
            ->andFilterWhere(['like', 'Titulo_libro', $this->Titulo_libro])
            ->andFilterWhere(['like', 'Editores', $this->Editores])
            ->andFilterWhere(['like', 'ISBN', $this->ISBN])
            ->andFilterWhere(['like', 'URL', $this->URL])
            ->andFilterWhere(['like', 'Palabras_clave', $this->URL])
            ->andFilterWhere(['like', 'Formato', $this->URL]);

        return $dataProvider;
    }
}
