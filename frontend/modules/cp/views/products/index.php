<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body p-4">

                    <p>
                        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//                            'id',
//                            'image',
                            'name',
                            'count',
                            'price',
//                            'box',
                            //'box_price',
//                            'category_id',
                            [
                                'attribute'=>'category_id',
                                'value'=>function($d){
                                    return $d->category->name;
                                },
                                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Categories::find()->all(),'id','name')
                            ],
                            'brand',
                            //'description',
                            //'code',
                            //'bio',
                            //'is_sale',
                            //'status',
                            //'created_at',
                            //'updated_at',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action,  $model, $key, $index, $column) {
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
