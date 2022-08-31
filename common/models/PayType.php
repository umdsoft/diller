<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pay_type".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property SalePayHistory[] $salePayHistories
 * @property SupplierPayHistory[] $supplierPayHistories
 */
class PayType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
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
        ];
    }

    /**
     * Gets query for [[SalePayHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalePayHistories()
    {
        return $this->hasMany(SalePayHistory::className(), ['type_id' => 'id']);
    }

    /**
     * Gets query for [[SupplierPayHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierPayHistories()
    {
        return $this->hasMany(SupplierPayHistory::className(), ['type_id' => 'id']);
    }
}
