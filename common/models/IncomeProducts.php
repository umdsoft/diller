<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "income_products".
 *
 * @property int $id
 * @property int $income_id
 * @property int|null $product_id
 * @property string|null $serial
 * @property string|null $exp_date
 * @property string|null $count
 * @property string|null $box
 * @property string|null $price
 * @property string|null $amout
 *
 * @property Income $income
 * @property Products $product
 */
class IncomeProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'income_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['income_id'], 'required'],
            [['income_id', 'product_id'], 'integer'],
            [['exp_date'], 'safe'],
            [['serial', 'count', 'box', 'price', 'amout'], 'string', 'max' => 255],
            [['income_id'], 'exist', 'skipOnError' => true, 'targetClass' => Income::className(), 'targetAttribute' => ['income_id' => 'id']],
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
            'income_id' => 'Prixod raqami',
            'product_id' => 'Mahsulot',
            'serial' => 'Seriya raqami',
            'exp_date' => 'Yaroqlilik muddati',
            'count' => 'Soni',
            'box' => 'Karopkalar soni',
            'price' => 'Narxi',
            'amout' => 'Sotilish narxi',
        ];
    }

    /**
     * Gets query for [[Income]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncome()
    {
        return $this->hasOne(Income::className(), ['id' => 'income_id']);
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
