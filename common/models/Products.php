<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $image
 * @property string $name
 * @property int $count
 * @property int $price
 * @property int $box
 * @property int $box_price
 * @property int $category_id
 * @property int $brand
 * @property string|null $description
 * @property string $code
 * @property string|null $bio
 * @property int $is_sale
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Categories $category
 * @property OrderProducts[] $orderProducts
 * @property ProductImages $productImages
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'count', 'price', 'box', 'box_price', 'category_id', 'brand', 'code'], 'required'],
            [['count', 'price', 'box', 'box_price', 'category_id', 'brand', 'is_sale', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['image', 'name', 'description', 'code', 'bio'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'name' => 'Name',
            'count' => 'Count',
            'price' => 'Price',
            'box' => 'Box',
            'box_price' => 'Box Price',
            'category_id' => 'Category ID',
            'brand' => 'Brand',
            'description' => 'Description',
            'code' => 'Code',
            'bio' => 'Bio',
            'is_sale' => 'Is Sale',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[OrderProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProducts::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasOne(ProductImages::className(), ['product_id' => 'id']);
    }
}
