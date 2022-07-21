<?php

use common\models\ProductImages;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
///* @var $model1 common\models\ProductImages */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mahsulotlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


?>
<div class="products-view">

    <p>
        <?= Html::a('O`zgartirish', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'image',
            [
                'attribute'=>'image',
                'value'=>function($d){
                    return "<img src='/upload/{$d->image}'>";
                },
                'format'=>'raw'
            ],
            'name',
//            'count',
            'price',
            'box',
//            'box_price',
//            'category_id',
            [
                'attribute'=>'category_id',
                'value'=>function($d){
                    return $d->category->name;
                }
            ],
//            'brand',
            [
                'attribute'=>'brand_id',
                'value'=>function($d){
                    return $d->brand->name;
                }
            ],
            'description',
            'code',
            'bio',
//            'is_sale',
            [
                'attribute'=>'is_sale',
                'value'=>function($d){
                    return Yii::$app->params['is_sale'][$d->is_sale];
                }
            ],
//            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
