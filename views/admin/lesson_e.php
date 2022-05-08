<?php

use app\widgets\AdminNavbarWidget;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Редагування уроку №' . $id;
?>
<div class="admin-lesson">

    <?php if (Yii::$app->session->hasFlash('editLessonFormSubmitted')): ?>
        <div class="alert alert-success">
            Дані про урок успішно змінені!
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-3">
            <?= AdminNavbarWidget::widget(['page' => 'lesson-e']) ?>
        </div>
        <div class="col-md-8 offset-md-1">

            <h1 class="mb-4"><?= $this->title ?></h1>

            <?php $form = ActiveForm::begin(['id' => 'edit-lesson-form']); ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('Назва уроку') ?>

            <?= $form->field($model, 'description')->textarea()->label('Опис') ?>

            <?= $form->field($model, 'video')->fileInput()->label('Відео') ?>

            <div class="form-group">
                <?= Html::submitButton('Редагувати урок', ['class' => 'btn btn-primary', 'name' => 'edit-form-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>