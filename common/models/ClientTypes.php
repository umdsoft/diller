<?php

namespace common\models;

use Behat\Transliterator\Transliterator;
use Yii;

/**
 * This is the model class for table "client_types".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 *
 * @property ClientSubjects[] $clientSubjects
 */
class ClientTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name', 'code'], 'string', 'max' => 255],
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
            'code' => 'kod',
        ];
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
     * Gets query for [[ClientSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientSubjects()
    {
        return $this->hasMany(ClientSubjects::className(), ['type_id' => 'id']);
    }
}
