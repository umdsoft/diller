<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'warehouse';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body p-4">
                    <p>
                        <?= Html::a('Create warehouse', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//                            'id',
                            'name',
                             'branch_id',
'is_full',
//                            'created',
                            //'updated',
//                            'role_id',

                            //'status',
                            //'auth_key',
                            //'verification_token',
                            //'password_reset_token',
//                            'branch_id',

                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                }
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->






</div>
