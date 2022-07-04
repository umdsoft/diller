<?php

namespace common\models;

use Behat\Transliterator\Transliterator;
use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $image
 * @property int $category_id
 * @property Categories $category
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name', 'code','image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'code' => 'Kod',
            'category_id' => 'Turi',
            'image' => 'Rasm',
        ];
    }

    public function getCategory(){
        return $this->hasOne(Categories::className(),['id'=>'category_id']);
    }

    public function slug(){
        $this->code = Transliterator::transliterate($this->name);
    }
}
