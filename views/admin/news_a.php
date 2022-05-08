<?php

use app\widgets\AdminNavbarWidget;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Додавання новини';
?>
<div class="admin-lesson">
    <?php if (Yii::$app->session->hasFlash('addNewsFormSubmitted')): ?>
        <div class="alert alert-success">
            Новину успішно додано!
        </div>
    <?php endif; ?>
    <div class="row mt-5">
        <div class="col-md-3">
            <?= AdminNavbarWidget::widget(['page' => 'lesson-a']) ?>
        </div>
        <div class="offset-md-1 col-lg-8">

            <h1 class="mb-4"><?= $this->title ?></h1>

            <?php $form = ActiveForm::begin(['id' => 'edit-lesson-form']); ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('Назва новини') ?>

            <?= $form->field($model, 'description')->textarea()->label('Опис') ?>

            <?= $form->field($model, 'author')->textInput()->label('Від кого') ?>

            <div class="form-group">
                <?= Html::submitButton('Додати новину', ['class' => 'btn btn-primary', 'name' => 'edit-form-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>