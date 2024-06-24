<?php

namespace ricit\humhub\modules\trayectoria\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\trayectoria\models\trayectoria;

/**
 * SearchT represents the model behind the search form of `app\models\trayectoria`.
 */
class SearchT extends trayectoria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Trayectoria_id', 'User_id'], 'integer'],
            [['sector', 'dependencia', 'pais', 'estado', 'cargo', 'periodo'], 'safe'],
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
        $query = trayectoria::find()->where(["User_id"=>$User_id]);

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
            'Trayectoria_id' => $this->Trayectoria_id,
            'User_id' => $this->User_id,
        ]);

        $query->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'dependencia', $this->dependencia])
            ->andFilterWhere(['like', 'pais', $this->pais])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'periodo', $this->periodo]);

        return $dataProvider;
    }

    public function searchAll($params)
    {
        $query = trayectoria::find();

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
            'Trayectoria_id' => $this->Trayectoria_id,
            'User_id' => $this->User_id,
        ]);

        $query->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'dependencia', $this->dependencia])
            ->andFilterWhere(['like', 'pais', $this->pais])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'periodo', $this->periodo]);

        return $dataProvider;
    }
}
