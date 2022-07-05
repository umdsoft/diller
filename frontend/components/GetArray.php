<?php


namespace frontend\components;


use common\models\Bank;
use common\models\Categories;
use common\models\ClientGroups;
use common\models\ClientTypes;
use common\models\LocDistrict;
use common\models\LocRegion;
use yii\helpers\ArrayHelper;


class GetArray
{
    public static function Category(){
        return ArrayHelper::map(Categories::find()->all(),'id','name');
    }
    public static function ClientGroup(){
        return ArrayHelper::map(ClientGroups::find()->all(),'id','name');
    }
    public static function ClientType(){
        return ArrayHelper::map(ClientTypes::find()->all(),'id','name');
    }
    public static function Region(){
        return ArrayHelper::map(LocRegion::find()->all(),'id','name');
    }
    public static function District($id=null){
        if($id == null){
            return ArrayHelper::map(LocDistrict::find()->all(),'id','name');
        }else{
            return ArrayHelper::map(LocDistrict::find()->where(['region_id'=>$id])->all(),'id','name');
        }
    }
    public static function Banks(){
        $data = [];
        foreach (Bank::find()->all() as $item){
            $data[$item->id] = $item->mfo.'-'.$item->name;
        }
        return $data;
    }
}