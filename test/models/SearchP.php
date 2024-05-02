<?php

namespace ricit\humhub\modules\test\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SearchP represents the model behind the search form of `app\models\Ponencias`.
 */
class SearchP extends Ponencias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Ponencia_id', 'User_id', 'Anio'], 'integer'],
            [['Tipo', 'Participación', 'Autor', 'País', 'Titulo_evento', 'Titulo_ponencia', 'Resumen', 'Memoria', 'Publicación'], 'safe'],
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

    function parentOpciones(){
        parent::getTipoOptions();
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
        $query = Ponencias::find();

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
            'Ponencia_id' => $this->Ponencia_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Tipo', $this->Tipo])
            ->andFilterWhere(['like', 'Participación', $this->Participación])
            ->andFilterWhere(['like', 'Autor', $this->Autor])
            ->andFilterWhere(['like', 'País', $this->País])
            ->andFilterWhere(['like', 'Titulo_evento', $this->Titulo_evento])
            ->andFilterWhere(['like', 'Titulo_ponencia', $this->Titulo_ponencia])
            ->andFilterWhere(['like', 'Resumen', $this->Resumen])
            ->andFilterWhere(['like', 'Memoria', $this->Memoria])
            ->andFilterWhere(['like', 'Publicación', $this->Publicación]);

        return $dataProvider;
    }

    public function search($params, $User_id)
    {
        $query = Ponencias::find()->where(['User_id'=>$User_id]);

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
            'Ponencia_id' => $this->Ponencia_id,
            'User_id' => $this->User_id,
            'Anio' => $this->Anio,
        ]);

        $query->andFilterWhere(['like', 'Tipo', $this->Tipo])
            ->andFilterWhere(['like', 'Participación', $this->Participación])
            ->andFilterWhere(['like', 'Autor', $this->Autor])
            ->andFilterWhere(['like', 'País', $this->País])
            ->andFilterWhere(['like', 'Titulo_evento', $this->Titulo_evento])
            ->andFilterWhere(['like', 'Titulo_ponencia', $this->Titulo_ponencia])
            ->andFilterWhere(['like', 'Resumen', $this->Resumen])
            ->andFilterWhere(['like', 'Memoria', $this->Memoria])
            ->andFilterWhere(['like', 'Publicación', $this->Publicación]);

        return $dataProvider;
    }
}
