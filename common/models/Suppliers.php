<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "suppliers".
 *
 * @property int $id
 * @property string $name
 * @property string $inn
 * @property string|null $oked
 * @property string|null $okonx
 * @property string|null $address
 * @property string $phone
 * @property string $director
 * @property string|null $buxgalter
 * @property string|null $phone_bux
 * @property string|null $nds_num
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Income[] $incomes
 */
class Suppliers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suppliers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'inn', 'oked', 'okonx', 'address', 'phone', 'director', 'buxgalter', 'phone_bux', 'nds_num'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'inn' => 'STIR(INN)',
            'oked' => 'OKED',
            'okonx' => 'OKONX',
            'address' => 'Manzil',
            'phone' => 'Telefon raqami',
            'director' => 'Rahbar',
            'buxgalter' => 'Buxgalter',
            'phone_bux' => 'Buxgalter raqami',
            'nds_num' => 'NDS raqami',
            'created_at' => 'Yaratildi',
            'updated_at' => 'O`zgartirildi',
        ];
    }

    /**
     * Gets query for [[Incomes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncomes()
    {
        return $this->hasMany(Income::className(), ['supplier_id' => 'id']);
    }
}
