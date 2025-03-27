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
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'phone_private', $this->phone_private])
            ->andFilterWhere(['like', 'phone_work', $this->phone_work])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'im_xmpp', $this->im_xmpp])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'url_facebook', $this->url_facebook])
            ->andFilterWhere(['like', 'url_linkedin', $this->url_linkedin])
            ->andFilterWhere(['like', 'url_instagram', $this->url_instagram])
            ->andFilterWhere(['like', 'url_xing', $this->url_xing])
            ->andFilterWhere(['like', 'url_youtube', $this->url_youtube])
            ->andFilterWhere(['like', 'url_vimeo', $this->url_vimeo])
            ->andFilterWhere(['like', 'url_tiktok', $this->url_tiktok])
            ->andFilterWhere(['like', 'url_twitter', $this->url_twitter]);

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
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'phone_private', $this->phone_private])
            ->andFilterWhere(['like', 'phone_work', $this->phone_work])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'im_xmpp', $this->im_xmpp])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'url_facebook', $this->url_facebook])
            ->andFilterWhere(['like', 'url_linkedin', $this->url_linkedin])
            ->andFilterWhere(['like', 'url_instagram', $this->url_instagram])
            ->andFilterWhere(['like', 'url_xing', $this->url_xing])
            ->andFilterWhere(['like', 'url_youtube', $this->url_youtube])
            ->andFilterWhere(['like', 'url_vimeo', $this->url_vimeo])
            ->andFilterWhere(['like', 'url_tiktok', $this->url_tiktok])
            ->andFilterWhere(['like', 'url_twitter', $this->url_twitter]);

        return $dataProvider;
    }

    


}
