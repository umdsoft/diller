<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\IncomeProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Income Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Income Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'income_id',
            'product_id',
            'serial',
            'exp_date',
            //'count',
            //'box',
            //'price',
            //'amout',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, IncomeProducts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
