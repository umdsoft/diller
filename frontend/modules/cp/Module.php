<?php

namespace frontend\modules\cp;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * cp module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\cp\controllers';
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
                            if(Yii::$app->user->identity->role_id != 5){
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
        Yii::$app->layoutPath = "@app/modules/cp/views/layouts";

        // custom initialization code goes here
    }
}
