<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "income_order_products".
 *
 * @property int $id
 * @property int $product_id
 * @property string $count
 * @property int|null $box
 * @property string $total
 * @property int|null $status
 * @property int $order_id
 *
 * @property IncomeOrders $order
 * @property Products $product
 */
class IncomeOrderProducts extends \yii\db\ActiveRecord
{
    public $removed = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'income_order_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'count', 'total', 'order_id'], 'required'],
            [['product_id', 'box', 'status', 'order_id','removed'], 'integer'],
            [['count', 'total'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => IncomeOrders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Mahsulot',
            'count' => 'Soni',
            'box' => 'Qutilar soni',
            'total' => 'Umumiy soni',
            'status' => 'Status',
            'order_id' => 'Buyurtma',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(IncomeOrders::className(), ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
