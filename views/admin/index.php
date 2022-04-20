<?php

use app\widgets\AdminNavbarWidget;
use yii\helpers\Url;
$this->title = 'Початкова';
?>
<div class="site-admin">
    <?php if (Yii::$app->session->hasFlash('deleteLessonFormSubmitted')): ?>
    <div class="alert alert-danger">
        Урок успішно видалено!
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-3">
            <?= AdminNavbarWidget::widget(['page' => 'index']) ?>
        </div>
        <div class="col-md-9">
            <p>Оберіть необхідний пункт ліворуч</p>
        </div>
    </div>
</div>