<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IncomeOrders */
/* @var $form yii\widgets\ActiveForm */
?>
    <script>
        var updatemodal = function () {

        }
    </script>
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
                            <th class="align-middle"></th>
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
                                <a class="text-success updatebtn" data-toggle="modal" data-target="#myModal" data-key="<?= $item->id?>"><i class="mdi mdi-pencil font-size-18"></i></a>
                                <a href="<?= Yii::$app->urlManager->createUrl(['/cp/income-orders/remove','id'=>$item->id])?>" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>


                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-lg" id="createmodal" data-toggle="modal" data-target="#myModal">Yana qo'shish</button>
                    </div>
            </div>
        </div>
    </div>

</div>



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mahsulot qo'shish</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                </div>
            </div>

        </div>
    </div>


<?php
$url = Yii::$app->urlManager->createUrl(['/cp/income-orders/product','id'=>$model->id]);
    $this->registerJs("
        $('#createmodal').click(function(){
            $('#myModal .modal-body').load('{$url}',function(){
                $('#myModal').modal({show:true});
                $('.select2').select2()
            });
        });
        $('.updatebtn').click(function(){
            id = this.getAttribute('data-key');
            $('#myModal .modal-body').load('{$url}&pid='+id,function(){
                 $('#myModal').modal({show:true});
            });
        })
    ")
?>