<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loc_region".
 *
 * @property int $id
 * @property string $name
 *
 * @property LocDistrict[] $locDistricts
 */
class LocRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loc_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Viloyat',
        ];
    }

    /**
     * Gets query for [[LocDistricts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocDistricts()
    {
        return $this->hasMany(LocDistrict::className(), ['region_id' => 'id']);
    }
}
