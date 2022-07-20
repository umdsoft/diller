<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ClientSubjects */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tadbirkorlik subyektlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-subjects-view">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">

                    <div class="row">
                        <div class="col-md-8">
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
                        </div>
                        <div class="col-md-4">
                            <h5>
                                Qo'shimcha ma'lumotlar
                            </h5>
                        </div>
                        <div class="col-md-8">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id',
                                    'name',
                                    'alt_name',
//                            'district_id',
//                            'address',
                                    [
                                        'attribute'=>'address',
                                        'value'=>function($d){
                                            return $d->district->region->name.' '.$d->district->name.' '.$d->address;
                                        }
                                    ],
//                            'lan',
//                            'lng',
                                    'phone',
                                    'email:email',
                                    'director',
                                    'inn',
                                    'oked',
                                    'nds_number',
                                    'referent_point',
                                    [
                                        'attribute'=>'type_id',
                                        'value'=>function($d){
                                            return $d->type->name;
                                        }
                                    ],
                                    [
                                        'attribute'=>'group_id',
                                        'value'=>function($d){
                                            return $d->group->name;
                                        }
                                    ],
//                            'type_id',
//                            'group_id',
                                    'note',
                                    'created_at',
                                    'updated_at',
                                ],
                            ]) ?>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">
                                            Bank hisob raqamlari
                                        </h4>
                                        <div class="flex-shrink-0">
                                            <button class="btn btn-success"  data-toggle="modal" data-target="#addaccount">Qo'shish</button>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>MFO</th>
                                                <th>Hisob raqami</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $n=0; foreach ($model->bank as $item): $n++;?>
                                                    <tr>
                                                        <td><?= $n?></td>
                                                        <td><?= $item->bank->mfo.'-'.$item->bank->name?></td>
                                                        <td><?= $item->account?></td>
                                                        <td>
                                                            <a href="<?= Yii::$app->urlManager->createUrl(['/cp/client-subjects/deleteacc', 'id' => $item->id,'sid'=>$model->id]) ?>" data-method="post" data-confirm="Siz rostdan ham ushbu hisobni o`chirmoqchimisiz?"><span class="fa fa-trash text-danger"></span></a></td>
                                                    </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


</div>



<?= $this->render('_account')?>