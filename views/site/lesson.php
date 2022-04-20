<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\FormatConverter;

$this->title = 'Урок #'.$id;
$this->params['breadcrumbs'][] =  ['label' => 'Навчання', 'url' => ['site/learning']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-lesson mb-5">
    <h1><?= $lesson->title ?></h1>
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card text-center">
                <div class="card-header bg-primary">
                    <h3 class="text-white"><?= Html::encode($this->title) ?></h3>
                </div>
                <p class="card-text mb-4 mt-4"><?= $lesson->description ?></p>
                <div class="card-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video width="100%" height="400" controls>
                            <source src="<?= $lesson->video ?>" type="video/mp4">
                            Your browser doesn't support HTML5 video tag.
                        </video>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Відео було додане: <?= date('d/m/Y',strtotime($lesson->created_at)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
