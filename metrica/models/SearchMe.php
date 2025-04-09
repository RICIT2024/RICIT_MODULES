<?php

namespace ricit\humhub\modules\metrica\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ricit\humhub\modules\metrica\models\metrica;

class SearchMe extends metrica
{
    public function rules()
    {
        return [
            [['user_id', 'birthday_hide_year', 'aniosexperiencias'], 'integer'],
            [['firstname', 'lastname', 'title', 'gender', 'street', 'zip', 'city', 'country', 'state', 'birthday', 'about', 'phone_private', 'phone_work', 'mobile', 'fax', 'im_xmpp', 'url', 'url_facebook', 'url_linkedin', 'url_instagram', 'url_xing', 'url_youtube', 'url_vimeo', 'url_tiktok', 'url_twitter', 'municipio', 'entidad', 'rangoga', 'sni', 'aboutme', 'correocont'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    // Método para obtener la distribución por Rango de Edad (Rangoga)
    public function getRangogaData()
    {
        return self::find()
            ->select(['rangoga', 'count(*) as total'])
            ->groupBy('rangoga')
            ->asArray()
            ->all();
    }

    // Método para obtener la distribución por SNI
    public function getSniData()
    {
        return self::find()
            ->select(['sni', 'count(*) as total'])
            ->groupBy('sni')
            ->asArray()
            ->all();
    }

    // Método para obtener la distribución de Niveles SNI
    public function getSniLevelsData()
    {
        return self::find()
            ->select(['sni', 'count(*) as total'])
            ->groupBy('sni')
            ->asArray()
            ->all();
    }

    // Método para obtener la distribución de entidades (mapa)
    public function getEntidadData()
    {
        return self::find()
            ->select(['entidad', 'latitude', 'longitude', 'count(*) as cantidad'])
            ->groupBy('entidad')
            ->asArray()
            ->all();
    }

    // Método de búsqueda general
    public function search($params)
    {
        $query = metrica::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'birthday_hide_year' => $this->birthday_hide_year,
            'birthday' => $this->birthday,
            'aniosexperiencias' => $this->aniosexperiencias,
        ]);

        // Filtros por campos de texto
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
            ->andFilterWhere(['like', 'url_twitter', $this->url_twitter])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'entidad', $this->entidad])
            ->andFilterWhere(['like', 'rangoga', $this->rangoga])
            ->andFilterWhere(['like', 'sni', $this->sni])
            ->andFilterWhere(['like', 'aboutme', $this->aboutme])
            ->andFilterWhere(['like', 'correocont', $this->correocont]);

        return $dataProvider;
    }

    // Método de búsqueda general que incluiría todos los filtros
    public function searchAll($params)
    {
        return $this->search($params);
    }
}
