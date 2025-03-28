<?php

namespace ricit\humhub\modules\profile\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\profile\models\Profile;

/**
 * SearchPr represents the model behind the search form of `app\models\Profile`.
 */
class SearchPr extends Profile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'birthday_hide_year'], 'integer'],
            [['firstname', 'lastname', 'title', 'gender', 'street', 'zip', 'city', 'country', 'state', 'birthday', 'about', 'phone_private', 'phone_work', 'mobile', 'fax', 'im_xmpp', 'url', 'url_facebook', 'url_linkedin', 'url_instagram', 'url_xing', 'url_youtube', 'url_vimeo', 'url_tiktok', 'url_twitter'], 'safe'],
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
        $query = Profile::find();

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
            'user_id' => $this->user_id,
            'birthday_hide_year' => $this->birthday_hide_year,
            'birthday' => $this->birthday,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'entidad', $this->entidad])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'ranogaga', $this->rangoga]);

        return $dataProvider;
    }
    public function searchAll($params)
    {
        $query = Profile::find();

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
            'user_id' => $this->user_id,
        
        ]);

        

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'entidad', $this->entidad])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'ranogaga', $this->rangoga]);
        return $dataProvider;
    }

    


}
