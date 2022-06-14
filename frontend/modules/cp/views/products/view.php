<?php

use common\models\ProductImages;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
///* @var $model1 common\models\ProductImages */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'image',
            'name',
            'count',
            'price',
            'box',
            'box_price',
            'category_id',
            'brand',
            'description',
            'code',
            'bio',
            'is_sale',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    <?= $this->render('_image_form', [
        'model' => $model,
    ]) ?>

</div>
