<?php

namespace ricit\humhub\modules\cientificos\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\cientificos\models\cientificos;

/**
 * SearchC represents the model behind the search form of `app\models\cientificos`.
 */
class SearchC extends cientificos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Eventos_id', 'User_id'], 'integer'],
            [['Evento', 'Nombre', 'Participación', 'Titulo', 'Anio', 'Pais'], 'safe'],
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
     * @param int 
     * @return ActiveDataProvider
     */
    public function search($params, $User_id)
    {
        $query = cientificos::find()->where(['User_id' => $User_id])->with('user');

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
            'Eventos_id' => $this->Eventos_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Evento', $this->Evento])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Participación', $this->Participación])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Pais', $this->Pais]);

        return $dataProvider;
    }

     /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param int 
     * @return ActiveDataProvider
     */
    public function searchAll($params)
    {
        $query = cientificos::find();

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
            'Eventos_id' => $this->Eventos_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Evento', $this->Evento])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Participación', $this->Participación])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Pais', $this->Pais]);

        return $dataProvider;
    }
}
