<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supplier_pay_history".
 *
 * @property int $id
 * @property string|null $note
 * @property int|null $price
 * @property int|null $supplier_id
 * @property int|null $type_id
 * @property int $operator_id
 * @property string|null $created
 * @property string|null $updated
 *
 * @property Users $operator
 * @property Suppliers $supplier
 * @property PayType $type
 */
class SupplierPayHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier_pay_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'supplier_id', 'type_id', 'operator_id'], 'integer'],
            [['operator_id'], 'required'],
            [['created', 'updated'], 'safe'],
            [['note'], 'string', 'max' => 255],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::className(), 'targetAttribute' => ['supplier_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PayType::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['operator_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'note' => 'Note',
            'price' => 'Price',
            'supplier_id' => 'Supplier ID',
            'type_id' => 'Type ID',
            'operator_id' => 'Operator ID',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * Gets query for [[Operator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperator()
    {
        return $this->hasOne(Users::className(), ['id' => 'operator_id']);
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Suppliers::className(), ['id' => 'supplier_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PayType::className(), ['id' => 'type_id']);
    }
}
