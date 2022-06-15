<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supplier".
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
            'name' => 'Name',
            'inn' => 'Inn',
            'oked' => 'Oked',
            'okonx' => 'Okonx',
            'address' => 'Address',
            'phone' => 'Phone',
            'director' => 'Director',
            'buxgalter' => 'Buxgalter',
            'phone_bux' => 'Phone Bux',
            'nds_num' => 'Nds Num',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
