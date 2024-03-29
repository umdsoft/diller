<?php


namespace frontend\components;


use common\models\Bank;
use common\models\Branches;
use common\models\Categories;
use common\models\ClientGroups;
use common\models\ClientTypes;
use common\models\LocDistrict;
use common\models\LocRegion;
use common\models\Products;
use common\models\ProductUnits;
use common\models\Suppliers;
use common\models\Users;
use common\models\Warehouse;
use yii\helpers\ArrayHelper;
use Yii;

class GetArray
{
    public static function User(){
        return ArrayHelper::map(Users::find()->all(),'id','name');
    }
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

    public static function Suppilers(){
        $data = [];
        foreach (Suppliers::find()->all() as $item){
            $data[$item->id] = $item->inn.'-'.$item->name;
        }
        return $data;
    }

    public static function Warehouses(){
        if(Yii::$app->user->identity->role_id == 5){
            return ArrayHelper::map(Warehouse::find()->all(),'id','name');
        }else{
            return ArrayHelper::map(Warehouse::find()->where(['branch_id'=>Yii::$app->user->identity->branch_id])->all(),'id','name');

        }
    }

    public static function Product()
    {
        $res = [];
        $pro = Products::find()->all();
        foreach ($pro as $item){
            $res[$item->id] = $item->name.'-'.$item->code;
        }
        return $res;
    }
    public static function IncomeProduct($id)
    {
        $res = [];
        $pro = Products::find()->where('id not in (select product_id from income_order_products where order_id = '.$id.')')->all();
        foreach ($pro as $item){
            $res[$item->id] = $item->name.'-'.$item->code;
        }
        return $res;
    }
    public static function Branches(){
        return ArrayHelper::map(Branches::find()->all(),'id','branch_name');
    }

    public static function Units(){
        return ArrayHelper::map(ProductUnits::find()->all(),'id','name');
    }

}