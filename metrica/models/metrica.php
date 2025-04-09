<?php

namespace ricit\humhub\modules\metrica\models;

use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "profile".
 *
 * @property int $user_id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $title
 * @property string|null $gender
 * @property string|null $street
 * @property string|null $zip
 * @property string|null $city
 * @property string|null $country
 * @property string|null $state
 * @property int|null $birthday_hide_year
 * @property string|null $birthday
 * @property string|null $about
 * @property string|null $phone_private
 * @property string|null $phone_work
 * @property string|null $mobile
 * @property string|null $fax
 * @property string|null $im_xmpp
 * @property string|null $url
 * @property string|null $url_facebook
 * @property string|null $url_linkedin
 * @property string|null $url_instagram
 * @property string|null $url_xing
 * @property string|null $url_youtube
 * @property string|null $url_vimeo
 * @property string|null $url_tiktok
 * @property string|null $url_twitter
 * @property string|null $municipio
 * @property string|null $entidad
 * @property string|null $rangoga
 * @property int|null $aniosexperiencias
 * @property string|null $sni
 * @property string|null $aboutme
 * @property string|null $correocont
 *
 * @property Certificaciones[] $certificaciones
 * @property Datosmb[] $datosmbs
 * @property Trayectoria[] $trayectorias
 * @property User $user
 */
class metrica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'birthday_hide_year', 'aniosexperiencias'], 'integer'],
            [['birthday'], 'safe'],
            [['about'], 'string'],
            [['firstname', 'lastname', 'title', 'gender', 'street', 'zip', 'city', 'country', 'state', 'phone_private', 'phone_work', 'mobile', 'fax', 'im_xmpp', 'url', 'url_facebook', 'url_linkedin', 'url_instagram', 'url_xing', 'url_youtube', 'url_vimeo', 'url_tiktok', 'url_twitter', 'municipio', 'entidad', 'rangoga', 'sni', 'aboutme', 'correocont'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'title' => 'Title',
            'gender' => 'Gender',
            'street' => 'Street',
            'zip' => 'Zip',
            'city' => 'City',
            'country' => 'Country',
            'state' => 'State',
            'birthday_hide_year' => 'Birthday Hide Year',
            'birthday' => 'Birthday',
            'about' => 'About',
            'phone_private' => 'Phone Private',
            'phone_work' => 'Phone Work',
            'mobile' => 'Mobile',
            'fax' => 'Fax',
            'im_xmpp' => 'Im Xmpp',
            'url' => 'Url',
            'url_facebook' => 'Url Facebook',
            'url_linkedin' => 'Url Linkedin',
            'url_instagram' => 'Url Instagram',
            'url_xing' => 'Url Xing',
            'url_youtube' => 'Url Youtube',
            'url_vimeo' => 'Url Vimeo',
            'url_tiktok' => 'Url Tiktok',
            'url_twitter' => 'Url Twitter',
            'municipio' => 'Municipio',
            'entidad' => 'Entidad',
            'rangoga' => 'Rangoga',
            'aniosexperiencias' => 'Aniosexperiencias',
            'sni' => 'Sni',
            'aboutme' => 'Aboutme',
            'correocont' => 'Correocont',
        ];
    }

    /**
     * Gets query for [[Certificaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCertificaciones()
    {
        return $this->hasMany(Certificaciones::class, ['User_id' => 'user_id']);
    }

    /**
     * Gets query for [[Datosmbs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatosmbs()
    {
        return $this->hasMany(Datosmb::class, ['user_id' => 'user_id']);
    }

    /**
     * Gets query for [[Trayectorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrayectorias()
    {
        return $this->hasMany(Trayectoria::class, ['User_id' => 'user_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
