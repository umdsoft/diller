<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Income */

$this->title = 'Kirim qilish';
$this->params['breadcrumbs'][] = ['label' => 'Kirimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-create">

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
