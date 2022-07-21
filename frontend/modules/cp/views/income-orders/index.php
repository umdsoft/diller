<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\IncomeOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buyurtmalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-orders-index">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p4">
                    <p>
                        <?= Html::a('Buyurtma qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'created',

                            [
                                'attribute'=>'number_full',
                                'value'=>function($d){
                                    $url = Yii::$app->urlManager->createUrl(['/cp/income-orders/view','id'=>$d->id]);
                                },
                                'format'=>'raw'
                            ],
                            'created',
//            'updated',
//            'number_full',
//            'number',
                            //'status',
//            'branch_id',
                            [
                                'attribute'=>'branch_id',
                                'value'=>function($d){
                                    return $d->branch->name;
                                },
                                'filter'=>\frontend\components\GetArray::Branches()
                            ],
                            [
                                'attribute'=>'status',
                                'value'=>function($d){
                                    return Yii::$app->params['order_status'][$d->status];
                                },
                                'filter'=>Yii::$app->params['order_status']
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>



</div>
