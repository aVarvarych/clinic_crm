<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Новини';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-lesson mb-5">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?php foreach($news as $one): ?>
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <b><?= $one['created_at'] ?></b>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p><?= $one['title'] ?></p>
                            <small>
                                <?= $one['description'] ?>
                            </small>
                            <footer class="blockquote-footer mt-4 text-right"><?= $one['author'] ?></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>