<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Вітаємо на порталі Іллінецької ЦРЛ!</h1>

        <p class="lead">Нижче Ви зможете знайти опис головних можливостей порталу</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Навчання</h2>

                <p>У цьому розділі Вам доступні відео-матеріали, в яких детально описані основні можливості та принципи роботи програми Healthy</p>

                <p><a class="btn btn-outline-secondary" href="<?= Url::toRoute(['site/learning']); ?>">Перейти до відео</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Контакти лікарів</h2>

                <p>Довідник з контактними даними усіх лікарів нашої ЦРЛ (e-mail та телефони) з доступним зручним пошуком</p>

                <p><a class="btn btn-outline-secondary" href="<?= Url::toRoute(['site/doctors']); ?>">Відкрити довідник</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Новини</h2>

                <p>Дізнавайтесь про усі актальні події та нововедденя сфери медицини та Іллінецкої ЦРЛ</p>

                <p><a class="btn btn-outline-secondary" href="<?= Url::toRoute(['site/news']); ?>">Читати новини</a></p>
            </div>
        </div>

    </div>
</div>
