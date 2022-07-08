<?php

namespace frontend\modules\store\controllers;

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

    public function actionArrival(){

    }


}
