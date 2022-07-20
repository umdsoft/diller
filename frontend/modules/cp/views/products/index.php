<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mahsulotlar ro`yhati';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body p-4">

                    <p>
                        <?= Html::a('Mahsulot qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//                            'id',
//                            'image',
                            'serial',
//                            'serial_num',
                            'name',
                            'price',
                            //'box',
                            [
                                'attribute'=>'category_id',
                                'value'=>function($d){
                                    return $d->category->name;
                                },
                                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Categories::find()->all(),'id','name')
                            ],
                            'brand_id',
                            //'note',
                            //'code',
                            //'bio',
//                            'is_sale',
                            [
                                'attribute'=>'is_sale',
                                'value'=>function($d){
                                    return Yii::$app->params['is_sale'][$d->is_sale];
                                },
                                'filter'=>Yii::$app->params['is_sale']
                            ],
                            //'status_id',
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
