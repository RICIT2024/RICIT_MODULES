<?php

namespace ricit\humhub\modules\actividades\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\actividades\models\actividades;

/**
 * SearchA represents the model behind the search form of `app\models\actividades`.
 */
class SearchA extends actividades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Actividades_id', 'User_id', 'Anio_ingreso'], 'integer'],
            [['Dependencia', 'Fecha', 'URL'], 'safe'],
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
     * @param int $User_id El ID del usuario para el cual se buscarán las certificaciones
     * @return ActiveDataProvider
     */
    public function search($params, $User_id)
    {
        $query = actividades::find()->where(['User_id' => $User_id])->with('user');

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
            'Actividades_id' => $this->Actividades_id,
            'User_id' => $this->User_id,
            'Anio_ingreso' => $this->Anio_ingreso,
            'Fecha' => $this->Fecha,
        ]);

        $query->andFilterWhere(['like', 'Dependencia', $this->Dependencia])
            ->andFilterWhere(['like', 'URL', $this->URL]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function searchAll($params)
    {
        $query = actividades::find();
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
            'Actividades_id' => $this->Actividades_id,
            'User_id' => $this->User_id,
            'Anio_ingreso' => $this->Anio_ingreso,
            'Fecha' => $this->Fecha,
        ]);

        $query->andFilterWhere(['like', 'Dependencia', $this->Dependencia])
            ->andFilterWhere(['like', 'URL', $this->URL]);

        return $dataProvider;
    }
}
