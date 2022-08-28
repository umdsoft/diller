<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Income */

$this->title = $model->created_at;
$this->params['breadcrumbs'][] = ['label' => 'Kirimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
    <div class="income-view">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body row" >
                        <div class="col-12" id="dontprint">
                                <?= Html::a('O`zgartirish', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            <button class="btn btn-info printbtn"><span class="fa fa-print"></span> Pechatga chiqarish
                            </button>
                        </div>

                        <div class="row" id="print">
                            <h3 style="color: #000; font-weight: bold; text-align: center">Kirim qilingan mahsulotlar
                                ro'yhati</h3>
                            <?php foreach ($suppliers as $item): ?>
                                <div class="col-md-6 table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="5" class="text-center" style="font-weight: bold">
                                                <?= $item->name ?>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $n = 0;
                                        $count = 0;
                                        $sum = 0;
                                        foreach (\common\models\IncomeProducts::find()->where(['income_id' => $model->id])
                                                     ->andWhere('product_id in (select id from products where supplier_id = ' . $item->id . ')')->all() as $p): $n++; ?>
                                            <tr>
                                                <?php
                                                $p->count = (int)$p->count;
                                                $count += $p->count + $p->box * $p->product->box;
                                                $sum += ($p->count + $p->box * $p->product->box) * $p->price;
                                                ?>
                                                <td><?= $n ?></td>
                                                <td><?= $p->product->name ?></td>
                                                <td><?= $p->box * $p->product->box + $p->count ?></td>
                                                <td><?= asDecimal($p->price) ?></td>

                                                <td class="text-right"><?= asDecimal(($p->count + $p->box * $p->product->box) * $p->price) ?></td>

                                            </tr>
                                        <?php endforeach; ?>
                                        <tr class="font-weight-bold">
                                            <td colspan="2" class="text-left">Jami</td>
                                            <td colspan="2"><?= $count ?></td>
                                            <td class="text-right"><?= asDecimal($sum) . " so'm" ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <style type="text/css">
        @media print {
            #dontprint {
                display: none;
            }

            #print {
                display: block;
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