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
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <b>10.04.2022</b>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                        </small>
                        <footer class="blockquote-footer mt-4 text-right">Міністерство Охорони Здоров'я</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>