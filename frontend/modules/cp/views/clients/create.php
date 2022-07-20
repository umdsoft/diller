<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Clients */

$this->title = 'Mijoz qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Mijozlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-create">

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


</div>
