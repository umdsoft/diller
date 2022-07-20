<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Clients */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mijozlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clients-view">

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
                            'username',
                            'password',
                            'email:email',
                            'name',
                            [
                                'attribute'=>'status',
                                'value'=>function($d){
                                    return Yii::$app->params['status'][$d->status];
                                },
                                'filter'=>Yii::$app->params['status']
                            ],
//                            'status',
//                            'auth_key',
//                            'verification_token',
//                            'password_reset_token',
                            'created_at',
                            'updated_at',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>


</div>
