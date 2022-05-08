<?php

use app\widgets\AdminNavbarWidget;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Редагування новини №' . $id;
?>
<div class="admin-lesson">

    <?php if (Yii::$app->session->hasFlash('editNewsFormSubmitted')): ?>
        <div class="alert alert-success">
            Дані про новину успішно змінені!
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-3">
            <?= AdminNavbarWidget::widget(['page' => 'news-e']) ?>
        </div>
        <div class="col-md-8 offset-md-1">

            <h1 class="mb-4"><?= $this->title ?></h1>

            <?php $form = ActiveForm::begin(['id' => 'edit-lesson-form']); ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('Назва уроку') ?>

            <?= $form->field($model, 'description')->textarea()->label('Опис') ?>

            <?= $form->field($model, 'author')->textInput()->label('Від кого ') ?>

            <div class="form-group">
                <?= Html::submitButton('Редагувати новину', ['class' => 'btn btn-primary', 'name' => 'edit-form-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>