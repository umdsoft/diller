<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IncomeOrders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="income-orders-form">
    <div class="card-title">
        <h3 class="card-title text-primary">
            Buyurtmachi filial: <b><?= $model->branch->branch_name ?></b>
            <span style="float: right">Buyurtma sanasi: <b><?= $model->created=='CURRENT_TIMESTAMP'?date('d.m.Y'):date('d.m.Y',strtotime($model->created))?></b></span>
        </h3>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="table-responsive">
                <table class="table align-middle table-nowrap table-check">
                    <thead class="table-light">
                    <tr>

                        <th class="align-middle">#</th>
                        <th class="align-middle">Mahsulot nomi</th>
                        <th class="align-middle">Qutilar soni</th>
                        <th class="align-middle">Soni</th>
                        <th class="align-middle">Umumiy soni</th>
                        <th class="align-middle"><a href="<?= Yii::$app->urlManager->createUrl(['/cp/income-orders/order','id'=>$model->id])?>">Yana qo'shish</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $n = 0;foreach ($model->incomeOrderProducts as $item): $n++;?>
                    <tr>
                        <td><?= $n;?></td>
                        <td><?= $item->product->name;?></td>
                        <td>
                            <?= $item->box ?>
                        </td>
                        <td>
                            <?= $item->count?>
                        </td>

                        <td>
                            <?= $item->total ?>
                        </td>
                        <td>
                            <div class="d-flex gap-3">
                                <a href="" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                <a href="<?= Yii::$app->urlManager->createUrl(['/cp/income-orders/remove','id'=>$item->id])?>" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>


                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a href="<?= Yii::$app->urlManager->createUrl(['/cp/income-orders/update','id'=>$model->id,'type'=>'submit'])?>" class="btn btn-success">
                    Saqlash
                </a>
            </div>
        </div>
    </div>

</div>

