<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Filiallar ro`yhati';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">


    <div class="row">
        <div class="col-12">
            <div class="card">


                <div class="card-body p-4">
                    <p>
                        <?= Html::a('Filial qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//            'id',
                            'code',
                            'branch_name',
                            'contracgen_name',
                            'leader',
                            'alternative_name',

                            'responsible',

//            'number',
                            'inn',
                            'phone',
                            //'status',
                            //'address',
                            'created_at',
                            [
                                'attribute'=>'status',
                                'value'=>function($d){
                                    return Yii::$app->params['status'][$d->status];
                                }
                            ],
                            //'updated_at',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action,  $model, $key, $index, $column) {
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

