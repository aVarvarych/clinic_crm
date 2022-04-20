<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Навчання';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-learning">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?php foreach($lessons as $lesson): ?>
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    Урок №<?= $lesson->id ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $lesson->title ?></h5>
                    <p class="card-text"><?= $lesson->description ?></p>
                    <a href="<?= Url::toRoute(['site/lesson/'.$lesson->id]) ?>" class="btn btn-primary">Дивитись</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
