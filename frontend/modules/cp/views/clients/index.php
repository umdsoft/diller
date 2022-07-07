<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mijozlar ro`yhati';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-index">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <p>
                        <?= Html::a('Mijoz qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//                            'id',
                            'name',
                            'username',
//                            'password',
                            'email:email',

                            //'status',
                            [
                                'attribute'=>'status',
                                'value'=>function($d){
                                    return Yii::$app->params['status'][$d->status];
                                },
                                'filter'=>Yii::$app->params['status']
                            ],
                            //'auth_key',
                            //'verification_token',
                            //'password_reset_token',
                            'created_at',
                            //'updated_at',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                }
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>



</div>
