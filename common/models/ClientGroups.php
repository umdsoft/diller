<?php

namespace common\models;

use Behat\Transliterator\Transliterator;
use Yii;

/**
 * This is the model class for table "client_groups".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 *
 * @property ClientSubjects[] $clientSubjects
 */
class ClientGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name', 'code'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Guruh',
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
        return $this->hasMany(ClientSubjects::className(), ['group_id' => 'id']);
    }
}
