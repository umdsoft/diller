<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Sale */

$this->title = '"'.$model->clientSubject->name.'"ga sotilgan mahsulotlar';
$this->params['breadcrumbs'][] = ['label' => 'Sotuv', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sale-view">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                        <p>
                            <?= Html::a('Update', ['#', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['#', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                            <button class="btn btn-info printbtn"><span class="fa fa-print"></span> Pechatga chiqarish
                            </button>
                            <button class="btn btn-warning">To'lov</button>
                            <a href="<?= Yii::$app->urlManager->createUrl(['/cp/sale/create'])?>" class="btn btn-success">Yangi savdo</a>
                            <span style="float: right"><a href="tel:+<?= $model->clientSubject->phone ?>"  class="btn btn-warning">+<?= $model->clientSubject->phone ?></a></span>
                        </p>

                    <hr>
                    <div class="table-responsive">
                        <h3 style="text-align: center">Sotuv kartochkasi</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Umumiy narxi</th>
                                    <th>To'landi</th>
                                    <th>To'lov holati</th>
                                    <th>Buyurtma turi</th>
                                    <th>Vaqt</th>
                                    <th>Operator</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $model->id?></td>
                                    <td><?= $model->total_price ?></td>
                                    <td><?= $model->paid?></td>
                                    <td><?= $model->payed->name?></td>
                                    <td><?= $model->type->name?></td>
                                    <td><?= $model->created ?></td>
                                    <td><?= $model->operator->name ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <h3 style="text-align: center">Sotilgan mahsulotlar ro'yhati</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mahsulot</th>
                                    <th>Yashik soni</th>
                                    <th>Soni</th>
                                    <th>Umumiy soni</th>
                                    <th>Narxi</th>
                                    <th>Umumiy narx</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_cnt=0;$box=0;$count=0; $n=0; $txt = ""; foreach ($model->saleProducts as $item): $n++;
                                $itotal_cnt = intval($item->count)+intval($item->box)*intval($item->product->box);
                                $total_cnt +=$itotal_cnt;
                                $box += intval($item->box); $count += $item->count; $txt = $item->product->unit->name;?>
                                    <tr>
                                        <td><?= $n?></td>
                                        <td><?= $item->product->name ?></td>
                                        <td><?= $item->box ?></td>
                                        <td><?= $item->count .' '.$txt?></td>
                                        <td><?= $itotal_cnt.' '.$txt ?></td>
                                        <td><?= $item->product->price ?> so'm</td>
                                        <td><?= $item->total ?> so'm</td>
                                    </tr>
                                <?php endforeach;?>
                                    <tr>
                                        <td colspan="2" style="text-align: center; font-weight: bold"><?= $model->clientSubject->phone ?></td>
                                        <td> </td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: right; font-weight: bold">Umumiy narxi:</td>
                                        <td style="font-weight: bold"><?= $model->total_price?> so'm</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php

$this->registerJs("
    $('.printbtn').click(function(){
        window.print() 
    })
")
?>