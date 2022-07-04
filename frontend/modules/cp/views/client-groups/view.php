<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ClientGroups */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tadbirkorlik guruhlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-groups-view">


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">

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

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'name',
                            'code',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>


</div>
