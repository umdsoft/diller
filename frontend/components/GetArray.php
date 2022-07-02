<?php


namespace frontend\components;


use common\models\Categories;
use yii\helpers\ArrayHelper;


class GetArray
{
    public static function Category(){
        return ArrayHelper::map(Categories::find()->all(),'id','name');
    }
}