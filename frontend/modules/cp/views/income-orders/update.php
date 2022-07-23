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