<?php

namespace ricit\humhub\modules\patentes\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\patentes\models\patentes;

/**
 * SearchP represents the model behind the search form of `app\models\patentes`.
 */
class SearchP extends patentes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Patentes_id', 'User_id'], 'integer'],
            [['autor', 'titulo_invencion', 'estatus_invencion', 'anio_estatus', 'clasificacion', 'asignatario'], 'safe'],
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
        $query = patentes::find()->where(["User_id"=>$User_id]);

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
            'Patentes_id' => $this->Patentes_id,
            'User_id' => $this->User_id,
            'anio_estatus' => $this->anio_estatus,
        ]);

        $query->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'titulo_invencion', $this->titulo_invencion])
            ->andFilterWhere(['like', 'estatus_invencion', $this->estatus_invencion])
            ->andFilterWhere(['like', 'clasificacion', $this->clasificacion])
            ->andFilterWhere(['like', 'asignatario', $this->asignatario]);

        return $dataProvider;
    }

    public function searchAll($params)
    {
        $query = patentes::find();

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
            'Patentes_id' => $this->Patentes_id,
            'User_id' => $this->User_id,
            'anio_estatus' => $this->anio_estatus,
        ]);

        $query->andFilterWhere(['like', 'autor', $this->autor])
            ->andFilterWhere(['like', 'titulo_invencion', $this->titulo_invencion])
            ->andFilterWhere(['like', 'estatus_invencion', $this->estatus_invencion])
            ->andFilterWhere(['like', 'clasificacion', $this->clasificacion])
            ->andFilterWhere(['like', 'asignatario', $this->asignatario]);

        return $dataProvider;
    }
}
