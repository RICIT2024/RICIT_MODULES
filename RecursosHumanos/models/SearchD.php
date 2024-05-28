<?php

namespace ricit\humhub\modules\RecursosHumanos\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\RecursosHumanos\models\Docencia;

/**
 * SearchD represents the model behind the search form of `app\models\Docencia`.
 */
class SearchD extends Docencia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Docencia_id', 'User_id'], 'integer'],
            [['Dependencia', 'Nivel_impartido', 'Nombre_programa', 'Pais', 'Estado', 'Nombre_asignatura', 'Periodo'], 'safe'],
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
        $query = Docencia::find()->where(["User_id"=>$User_id]);

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
            'Docencia_id' => $this->Docencia_id,
            'User_id' => $this->User_id,
        ]);

        $query->andFilterWhere(['like', 'Dependencia', $this->Dependencia])
            ->andFilterWhere(['like', 'Nivel_impartido', $this->Nivel_impartido])
            ->andFilterWhere(['like', 'Nombre_programa', $this->Nombre_programa])
            ->andFilterWhere(['like', 'Pais', $this->Pais])
            ->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'Nombre_asignatura', $this->Nombre_asignatura])
            ->andFilterWhere(['like', 'Periodo', $this->Periodo]);

        return $dataProvider;
    }

    public function searchAll($params)
    {
        $query = Docencia::find();

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
            'Docencia_id' => $this->Docencia_id,
            'User_id' => $this->User_id,
        ]);

        $query->andFilterWhere(['like', 'Dependencia', $this->Dependencia])
            ->andFilterWhere(['like', 'Nivel_impartido', $this->Nivel_impartido])
            ->andFilterWhere(['like', 'Nombre_programa', $this->Nombre_programa])
            ->andFilterWhere(['like', 'Pais', $this->Pais])
            ->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'Nombre_asignatura', $this->Nombre_asignatura])
            ->andFilterWhere(['like', 'Periodo', $this->Periodo]);

        return $dataProvider;
    }
}
