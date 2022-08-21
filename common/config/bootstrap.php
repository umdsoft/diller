<?php

use yii\helpers\VarDumper;

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

function dd(...$varibles)
{
    foreach ($varibles as $variable) {
        VarDumper::dump($variable, 10, true);
    }
    die();
}
