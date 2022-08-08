<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IncomeOrders */

$this->title = 'Buyurtma raqami: ' . $model->number_full;
$this->params['breadcrumbs'][] = ['label' => 'Buyurtmalar ro`yhati', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->number_full, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Buyurtma raqami';
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
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