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
 * @property Orders[] $orders
 * @property Products[] $products
 * @property Users[] $users
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
            [['branch_name', 'contracgen_name', 'leader', 'alternative_name', 'status', 'responsible', 'code', 'number', 'address'], 'required'],
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
            'contracgen_name' => 'Qisqartma nomi',
            'leader' => 'Rahbar',
            'alternative_name' => 'Alternative nom',
            'status' => 'Status',
            'responsible' => 'Javobgar',
            'code' => 'Kod',
            'number' => 'Raqami',
            'inn' => 'STIR(INN)',
            'phone' => 'Telefon raqami',
            'address' => 'Manzil',
            'created_at' => 'Yaratildi',
            'updated_at' => 'O`zgartirildi',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['sklad_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['sklad_id' => 'id']);
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
}
