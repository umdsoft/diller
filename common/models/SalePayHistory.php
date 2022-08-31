<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sale_pay_history".
 *
 * @property int $id
 * @property string|null $note
 * @property int $price
 * @property int|null $type_id
 * @property int|null $sale_id
 * @property int $operator_id
 * @property string|null $created
 * @property string|null $updated
 *
 * @property Users $operator
 * @property Sale $sale
 * @property PayType $type
 */
class SalePayHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_pay_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'operator_id'], 'required'],
            [['price', 'type_id', 'sale_id', 'operator_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['note'], 'string', 'max' => 255],
            [['sale_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sale::className(), 'targetAttribute' => ['sale_id' => 'id']],
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
            'type_id' => 'Type ID',
            'sale_id' => 'Sale ID',
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
     * Gets query for [[Sale]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSale()
    {
        return $this->hasOne(Sale::className(), ['id' => 'sale_id']);
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
