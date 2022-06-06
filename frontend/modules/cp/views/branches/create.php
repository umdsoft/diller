<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Branches */

$this->title = 'Filial qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Filiallar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
