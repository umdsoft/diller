<?php

namespace frontend\modules\store;

use yii\filters\AccessControl;
use Yii;
/**
 * store module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\store\controllers';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule, $action){
                            if(Yii::$app->user->identity->role_id != 2){
                                $url = Yii::$app->user->identity->role->url;
                                header('Location:'.$url);
                                exit;
                            }else{
                                return true;
                            }
                        }
                    ],

                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::$app->layoutPath = "@app/modules/store/views/layouts";

        // custom initialization code goes here
    }
}
