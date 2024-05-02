<?php

namespace ricit\humhub\modules\test\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\test\models\Tesis;

/**
 * SearchT represents the model behind the search form of `app\models\Tesis`.
 */
class SearchT extends Tesis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tesis_id', 'User_id', 'Anio'], 'integer'],
            [['Autor', 'Grado_academico', 'Institucion_procedencia', 'Titulo', 'Pais'], 'safe'],
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
        $query = Tesis::find()->where(["User_id"=>$User_id]);

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
            'Tesis_id' => $this->Tesis_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Autor', $this->Autor])
            ->andFilterWhere(['like', 'Grado_academico', $this->Grado_academico])
            ->andFilterWhere(['like', 'Institucion_procedencia', $this->Institucion_procedencia])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Pais', $this->Pais]);

        return $dataProvider;
    }

    public function searchAll($params)
    {
        $query = Tesis::find();

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
            'Tesis_id' => $this->Tesis_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Autor', $this->Autor])
            ->andFilterWhere(['like', 'Grado_academico', $this->Grado_academico])
            ->andFilterWhere(['like', 'Institucion_procedencia', $this->Institucion_procedencia])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Pais', $this->Pais]);

        return $dataProvider;
    }
}
