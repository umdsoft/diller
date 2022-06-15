<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "income_products".
 *
 * @property int $id
 * @property int|null $income_id
 * @property int|null $product_id
 * @property string|null $serial
 * @property string|null $exp_date
 * @property string|null $count
 * @property string|null $box
 * @property string|null $price
 * @property string|null $amout
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
            [['income_id', 'product_id'], 'integer'],
            [['exp_date'], 'safe'],
            [['serial', 'count', 'box', 'price', 'amout'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'income_id' => 'Income ID',
            'product_id' => 'Product ID',
            'serial' => 'Serial',
            'exp_date' => 'Exp Date',
            'count' => 'Count',
            'box' => 'Box',
            'price' => 'Price',
            'amout' => 'Amout',
        ];
    }
}
