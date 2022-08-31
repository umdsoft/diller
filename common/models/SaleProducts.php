<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sale_products".
 *
 * @property int $id
 * @property int|null $sale_id
 * @property int|null $product_id
 * @property string|null $count
 * @property int|null $box
 * @property string|null $total
 *
 * @property Products $product
 * @property Sale $sale
 */
class SaleProducts extends \yii\db\ActiveRecord
{
    public $serial,$exp_date,$price,$amout;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sale_id', 'product_id', 'box'], 'integer'],
            [['count', 'total'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['sale_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sale::className(), 'targetAttribute' => ['sale_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sale_id' => 'Sale ID',
            'product_id' => 'Product ID',
            'count' => 'Count',
            'box' => 'Box',
            'total' => 'Total',
        ];
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

    /**
     * Gets query for [[Sale]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSale()
    {
        return $this->hasOne(Sale::className(), ['id' => 'sale_id']);
    }
}
