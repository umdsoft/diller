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
 * @property int $brand_id
 * @property string|null $note
 * @property string $code
 * @property string|null $bio
 * @property int $is_sale
 * @property int $supplier_id
 * @property int $unit_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $brand_name
 *
 * @property Categories $category
 * @property Brand $brand
 * @property IncomeProducts[] $incomeProducts
 * @property ProductImages $productImages
 */
class Products extends \yii\db\ActiveRecord
{
    public $brand_name;
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
            [['serial','name', 'price', 'box', 'category_id', 'brand_name','supplier_id','unit_id'], 'required'],
            [['serial_num','serial', 'price', 'box', 'category_id', 'brand_id', 'is_sale', 'supplier_id','unit_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['image', 'serial', 'name', 'note', 'code', 'bio','brand_name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::className(), 'targetAttribute' => ['supplier_id' => 'id']],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductUnits::className(), 'targetAttribute' => ['unit_id' => 'id']],
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
            'brand_id' => 'Brend',
            'brand_name' => 'Brend',
            'note' => 'Izoh',
            'code' => 'Kod',
            'bio' => 'Bio',
            'unit_id' => 'Birlik',
            'is_sale' => 'Sotuvda mavjudligi',
            'created_at' => 'Yaratildi',
            'updated_at' => 'O`zgartirildi',
            'supplier_id' => 'Yetkazib beruvchi',
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

    public function getBrand(){
        return $this->hasOne(Brand::className(),['id'=>'brand_id']);
    }

    public function slug(){
        $this->code = Transliterator::transliterate($this->name);
        $n=0;
        while(static::findOne(['code'=>$this->code])){
            $n++;
            $this->code = Transliterator::transliterate($this->name).'-'.$n;
        }
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
    /**
     * Gets query for [[IncomeOrderProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncomeOrderProducts()
    {
        return $this->hasMany(IncomeOrderProducts::className(), ['product_id' => 'id']);
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
}
