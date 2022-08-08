<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\IncomeOrders */
/* @var $suppliers \common\models\Suppliers*/
$this->title = $model->number_full;
$this->params['breadcrumbs'][] = ['label' => 'Buyurtmalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="income-orders-view">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row" id="dontprint">
                        <div class="col-12">
                            <p>
                                <?= Html::a('O`zgartirish', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                                <button class="btn btn-info printbtn"><span class="fa fa-print"></span> Pechatga chiqarish</button>
                            </p>

                            <div class="row">
                                <div class="col-md-8">
                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
//                            'id',
                                            'created',
                                            'updated',
                                            'number_full',
//                            'number',
//                            'status',
//                            'branch_id',
                                            [
                                                'attribute'=>'branch_id',
                                                'value'=>function($d){
                                                    return $d->branch->branch_name;
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
                                    ]) ?>
                                </div>
                                <div class="col-md-4">
                                    <h3>
                                        Statusni o'zgartirish
                                    </h3>
                                    <?php $form = \yii\widgets\ActiveForm::begin() ?>

                                    <?= $form->field($model,'status')->dropDownList(Yii::$app->params['order_status'],['prompt'=>'Statusni tanlang'])?>

                                    <button type="submit" class="btn btn-success">Saqlash</button>
                                    <?php \yii\widgets\ActiveForm::end()?>
                                </div>
                            </div>


                            <hr>

                        </div>
                    </div>


                    <div class="row" id="print">
                        <h3 style="color: #000; font-weight: bold; text-align: center">Buyurtma qilingan mahsulotlar ro'yhati</h3>
                        <?php foreach ($suppliers as $item):?>
                            <div class="col-md-6 table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th colspan="3" class="text-center" style="font-weight: bold">
                                            <?=$item->name?>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $n=0; foreach (\common\models\IncomeOrderProducts::find()->where(['order_id'=>$model->id])
                                                             ->andWhere('product_id in (select id from products where supplier_id = '.$item->id.')')->all() as $p): $n++;?>
                                        <tr>
                                            <td><?= $n ?></td>
                                            <td><?= $p->product->name ?></td>
                                            <td><?= $p->total.' '.$p->product->unit->name; ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <style type="text/css">
        @media print {
            #dontprint {
                display:none;
            }

            #print{
                display:block;
            }
        }
    </style>

<?php

$this->registerJs("
    $('.printbtn').click(function(){
        window.print() 
    })
")
?>