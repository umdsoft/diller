<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IncomeOrders */

$this->title = 'Buyurtma qilish';
$this->params['breadcrumbs'][] = ['label' => 'Buyurtmalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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