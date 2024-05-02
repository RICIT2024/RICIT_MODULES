<?php

namespace ricit\humhub\modules\Estancias\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\Estancias\models\EstanciasInvestigacion;

/**
 * SearchEI represents the model behind the search form of `app\models\EstanciasInvestigacion`.
 */
class SearchEI extends EstanciasInvestigacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Estancia_id', 'User_id'], 'integer'],
            [['Institucion', 'Pais', 'Periodo'], 'safe'],
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
        $query = EstanciasInvestigacion::find()->where(['User_id'=> $User_id]);

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
            'Estancia_id' => $this->Estancia_id,
            'User_id' => $this->User_id,
        ]);

        $query->andFilterWhere(['like', 'Institucion', $this->Institucion])
            ->andFilterWhere(['like', 'Pais', $this->Pais])
            ->andFilterWhere(['like', 'Periodo', $this->Periodo]);

        return $dataProvider;
    }

    public function searchAll($params)
    {
        $query = EstanciasInvestigacion::find();

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
            'Estancia_id' => $this->Estancia_id,
            'User_id' => $this->User_id,
        ]);

        $query->andFilterWhere(['like', 'Institucion', $this->Institucion])
            ->andFilterWhere(['like', 'Pais', $this->Pais])
            ->andFilterWhere(['like', 'Periodo', $this->Periodo]);

        return $dataProvider;
    }
}
