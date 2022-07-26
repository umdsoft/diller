<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Income */

$this->title = 'O`zgartirish: ' . $model->created_at;
$this->params['breadcrumbs'][] = ['label' => 'Kirimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->created_at, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'O`zgartirish';
?>
<div class="income-update">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <?= $this->render('_form', [
                        'model' => $model,
                        'product'=>$product
                    ]) ?>

                </div>
            </div>
        </div>
    </div>

</div>
