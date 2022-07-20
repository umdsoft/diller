<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Users */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">
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
//                            'id',
                            'name',
                            'username',
                            'password',
                            'created',
                            'updated',
//                            'role_id',
                            [
                                'attribute'=>'role_id',
                                'value'=>function($d){
                                    return $d->role->name;
                                }
                            ],
//                            'status',
                            [
                                'attribute'=>'status',
                                'value'=>function($d){
                                    return Yii::$app->params['status'][$d->status];
                                },
                                'filter'=>Yii::$app->params['status']
                            ],
//                            'auth_key',
//                            'verification_token',
//                            'password_reset_token',
//                            'branch_id',
                            [
                                'attribute'=>'branch_id',
                                'value'=>function($d){
                                    return $d->branch->branch_name;
                                },
                            ],
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>


</div>
