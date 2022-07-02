<?php

namespace common\models;

use Behat\Transliterator\Transliterator;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $image
 * @property string|null $serial
 * @property int|null $serial_num
 * @property string $name
 * @property int $price
 * @property int $box
 * @property int $category_id
 * @property int $brand
 * @property string|null $note
 * @property string $code
 * @property string|null $bio
 * @property int $is_sale
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Categories $category
 * @property IncomeProducts[] $incomeProducts
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
            [['serial','name', 'price', 'box', 'category_id', 'brand'], 'required'],
            [['serial_num','serial', 'price', 'box', 'category_id', 'brand', 'is_sale', ], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['image', 'serial', 'name', 'note', 'code', 'bio'], 'string', 'max' => 255],
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
            'image' => 'Rasm',
            'serial' => 'Seriya',
            'serial_num' => 'Seriya raqami',
            'name' => 'Nomi',
            'price' => 'Narxi',
            'box' => 'Karopkadagi soni',
            'category_id' => 'Kategoriyasi',
            'brand' => 'Brend',
            'note' => 'Izoh',
            'code' => 'Kod',
            'bio' => 'Bio',
            'is_sale' => 'Sotuvda mavjudligi',
            'created_at' => 'Yaratildi',
            'updated_at' => 'O`zgartirildi',
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

    public function slug(){
        $this->code = Transliterator::transliterate($this->name);
    }
    /**
     * Gets query for [[IncomeProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncomeProducts()
    {
        return $this->hasMany(IncomeProducts::className(), ['product_id' => 'id']);
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
