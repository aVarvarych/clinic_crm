<?php

use app\widgets\AdminNavbarWidget;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;
$this->title = 'Додавання нового уроку';
?>
<div class="admin-lesson">
    <?php if (Yii::$app->session->hasFlash('addLessonFormSubmitted')): ?>
        <div class="alert alert-success">
            Урок успішно додано!
        </div>
    <?php else: ?>
        <div class="row mt-5">
            <div class="col-md-3">
                <?= AdminNavbarWidget::widget(['page' => 'lesson-a']) ?>
            </div>
            <div class="offset-md-1 col-lg-8">

                <h1 class="mb-4"><?= $this->title ?></h1>

                <?php $form = ActiveForm::begin(['id' => 'edit-lesson-form']); ?>

                <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('Назва уроку') ?>

                <?= $form->field($model, 'description')->textarea()->label('Опис') ?>

                <?= $form->field($model, 'video')->fileInput()->label('Відео') ?>

                <div class="form-group">
                    <?= Html::submitButton('Додати урок', ['class' => 'btn btn-primary', 'name' => 'edit-form-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>