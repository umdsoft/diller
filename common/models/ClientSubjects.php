<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client_subjects".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $alt_name
 * @property int|null $district_id
 * @property string|null $address
 * @property string|null $lan
 * @property string|null $lng
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $director
 * @property string|null $inn
 * @property string|null $oked
 * @property string|null $nds_number
 * @property string|null $referent_point
 * @property int|null $type_id
 * @property int|null $group_id
 * @property string|null $note
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ClientUserConnect[] $clientUserConnects
 * @property Clients[] $clients
 * @property LocDistrict $district
 * @property ClientGroups $group
 * @property ClientTypes $type
 */
class ClientSubjects extends \yii\db\ActiveRecord
{
    public $region;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','alt_name','type_id','group_id','address','phone','director','inn','district_id','region'],'required','on'=>'insert'],
            [['district_id', 'type_id', 'group_id','region'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'alt_name', 'address', 'lan', 'lng', 'phone', 'director', 'inn', 'oked', 'nds_number', 'referent_point'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 50],
            [['note'], 'string', 'max' => 500],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocDistrict::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientGroups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'To`liq nomi',
            'alt_name' => 'Qisqa noimi',
            'region' => 'Viloyat',
            'district_id' => 'Tuman',
            'address' => 'Manzil',
            'lan' => 'Lan',
            'lng' => 'Lng',
            'phone' => 'Telefon raqami',
            'email' => 'Email',
            'director' => 'Direktor',
            'inn' => 'STIR(INN)',
            'oked' => 'OKED',
            'nds_number' => 'NDS raqami',
            'referent_point' => 'Mo`ljal',
            'type_id' => 'Kontragent turi',
            'group_id' => 'Guruhi',
            'note' => 'Izoh',
            'created_at' => 'Yaratildi',
            'updated_at' => 'O`zgartirtildi',
        ];
    }

    /**
     * Gets query for [[ClientUserConnects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientUserConnects()
    {
        return $this->hasMany(ClientUserConnect::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Clients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Clients::className(), ['id' => 'client_id'])->viaTable('client_user_connect', ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(LocDistrict::className(), ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(ClientGroups::className(), ['id' => 'group_id']);
    }

    public function getBank(){
        return $this->hasMany(ClientAccounts::className(),['subject_id'=>'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ClientTypes::className(), ['id' => 'type_id']);
    }
}
