<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "branch_products".
 *
 * @property int $branch_id
 * @property int $product_id
 * @property string $count
 * @property string $box
 * @property string $price
 * @property string $updated
 *
 * @property Branches $branch
 * @property Products $product
 */
class BranchProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_id', 'product_id'], 'required'],
            [['branch_id', 'product_id'], 'integer'],
            [['updated'], 'safe'],
            [['count', 'box', 'price'], 'string', 'max' => 255],
            [['branch_id', 'product_id'], 'unique', 'targetAttribute' => ['branch_id', 'product_id']],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branch_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'product_id' => 'Product ID',
            'count' => 'Count',
            'box' => 'Box',
            'price' => 'Price',
            'updated' => 'Updated',
        ];
    }

    /**
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branches::className(), ['id' => 'branch_id']);
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
