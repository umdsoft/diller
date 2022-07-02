<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $id
 * @property string $branch_name
 * @property string $contracgen_name
 * @property string $leader
 * @property string $alternative_name
 * @property int $status
 * @property string $responsible
 * @property int $code
 * @property int $number
 * @property int|null $inn
 * @property int|null $phone
 * @property string $address
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Users[] $users
 * @property Warehouse[] $warehouses
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_name', 'contracgen_name', 'leader', 'alternative_name', 'responsible', 'code', 'number', 'address'], 'required'],
            [['status', 'code', 'number', 'inn', 'phone'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['branch_name', 'contracgen_name', 'leader', 'alternative_name', 'responsible', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'branch_name' => 'Filial nomi',
            'contracgen_name' => 'Kontragen nomi',
            'leader' => 'Rahbar',
            'alternative_name' => 'Alternativ nomi',
            'status' => 'Status',
            'responsible' => 'Mas`ul',
            'code' => 'Kod',
            'number' => 'Raqam',
            'inn' => 'STIR(INN)',
            'phone' => 'Telefon',
            'address' => 'Manzil',
            'created_at' => 'Yaratildi',
            'updated_at' => 'O`zgartirildi',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['branch_id' => 'id']);
    }

    /**
     * Gets query for [[Warehouses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouses()
    {
        return $this->hasMany(Warehouse::className(), ['branch_id' => 'id']);
    }
}
