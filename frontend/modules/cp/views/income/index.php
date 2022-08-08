<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\IncomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kirimlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-index">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p>
                        <?= Html::a('Kirim qilish', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'supplier_id',

                            'note:ntext',
//            'warehouse_id',
                            [
                                'attribute'=>'warehouse_id',
                                'value'=>function($d){
                                    return $d->warehouse->name;
                                },
                                'filter'=>\frontend\components\GetArray::Warehouses()
                            ],
//            'status_id',
                            'created_at',
                            //'updated_at',
//                            'user_id',
                            [
                                'attribute'=>'user_id',
                                'value'=>function($d){
                                    return $d->user->name;
                                },
                                'filter'=>\frontend\components\GetArray::User()
                            ],
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
