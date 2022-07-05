<?php

namespace frontend\modules\cp\controllers;

use frontend\components\GetArray;
use yii\web\Controller;

/**
 * Default controller for the `cp` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetdistrict($id){
        $model = GetArray::District($id);
        $res = "<option>-Tumanni tanlang-</option>";
        foreach ($model as $key=>$item){
            $res .= "<option value='{$key}'>{$item}</option>";
        }
        return $res;
    }
}
