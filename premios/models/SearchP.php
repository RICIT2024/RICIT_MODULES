<?php

namespace ricit\humhub\modules\premios\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\premios\models\premios;

/**
 * SearchP represents the model behind the search form of `app\models\premios`.
 */
class SearchP extends premios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Premios_id', 'User_id'], 'integer'],
            [['tipo', 'titulo', 'descripcion', 'dependencia', 'anio'], 'safe'],
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
        $query = premios::find()->where(['User_id'=> $User_id]);

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
            'Premios_id' => $this->Premios_id,
            'User_id' => $this->User_id,
            'anio' => $this->anio,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'dependencia', $this->dependencia]);

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
        $query = premios::find();

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
            'Premios_id' => $this->Premios_id,
            'User_id' => $this->User_id,
            'anio' => $this->anio,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'dependencia', $this->dependencia]);

        return $dataProvider;
    }
}
