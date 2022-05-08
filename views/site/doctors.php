<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Контакти лікарів';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-lesson mb-5">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-12 mt-5">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">П.І.П</th>
                    <th scope="col">Посада</th>
                    <th scope="col">Номер телефону</th>
                    <th scope="col">E-mail</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($doctors as $doctor): ?>
                        <tr>
                            <td><?= $doctor['name'] ?></td>
                            <td><?= $doctor['position'] ?></td>
                            <td><?= $doctor['phone'] ? '+380'.$doctor['phone'] : '' ?></td>
                            <td><?= $doctor['email'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>