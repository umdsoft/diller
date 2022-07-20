<?php

namespace frontend\modules\store\controllers;

use common\models\Income;
use common\models\IncomeProducts;
use yii\web\Controller;

/**
 * Default controller for the `store` module
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

    public function actionIncome(){
        $model = new Income();
        $model->status_id = 1;

        $products[] = new IncomeProducts();
        return $this->render('income',[
            'model'=>$model,
            'products'=>$products
        ]);
    }


}
