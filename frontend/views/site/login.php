<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="auth-content my-auto">
    <div class="text-center">
        <h5 class="mb-0">Xush kelibsiz!</h5>
        <p class="text-muted mt-2">Tizimning ko'proq imkoniyatlaridan foydalanish uchun kiring.</p>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'login-form','options'=>['class'=>'mt-4 pt-2']]); ?>

        <div class="form-floating form-floating-custom mb-4">
            <input type="text" class="form-control" name="LoginForm[username]" id="loginform-username" placeholder="Loginingizni kiriting">
            <label for="loginform-username">Login</label>
            <div class="form-floating-icon">
                <i data-feather="users"></i>
            </div>
        </div>

        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
            <input type="password" name="LoginForm[password]" class="form-control pe-5" id="loginform-password" placeholder="Parolingizni kiriting">

            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
            </button>
            <label for="input-password">Parol</label>
            <div class="form-floating-icon">
                <i data-feather="lock"></i>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="form-check font-size-15">
                    <input class="form-check-input" name="LoginForm[rememberMe]" type="checkbox" id="loginform-rememberMe">
                    <label class="form-check-label font-size-13" for="remember-check">
                        Eslab qolish
                    </label>
                </div>
            </div>

        </div>
        <div class="mb-3">
            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Kirish</button>
        </div>
    <?php ActiveForm::end(); ?>


    <div class="mt-5 text-center">
        <p class="text-muted mb-0">Sizda akkount mavjud emasmi? <a href="#" class="text-primary fw-semibold"> Ro'yhatdan o'tish </a> </p>
    </div>
</div>