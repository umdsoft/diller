<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sale */

$this->title = 'O`zgartirish: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sotuv', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'O`zgartirish';
?>
<div class="sale-update">


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body p-4">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->


</div>
