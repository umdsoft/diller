<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sotuv';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-index">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body p-4">
    <p>
        <?= Html::a('Sotish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'client_subject_id',
            [
                'attribute'=>'client_subject_id',
                'value'=>function($d){
                    $url = Yii::$app->urlManager->createUrl(['/cp/sale/view','id'=>$d->id]);
                    return "<a href='{$url}'>{$d->clientSubject->name}<br>{$d->clientSubject->phone}</a>";
                },
                'format'=>'raw',
            ],
//            'created',
            'total_price',
            'paid',
//            'payed_id',
//            'operator_id',
            [
                'attribute'=>'operator_id',
                'value'=>function($d){
                    return $d->operator->name;
                },
            ],
//            'type_id',
            [
                 'attribute'=>'type_id',
                'value'=>function($d){
                    return $d->type->name;
                },
            ],
            'updated',
            //'status_id',
            //'branch_id',
        ],
    ]); ?>
                </div>
            </div>
        </div>
    </div>

</div>
