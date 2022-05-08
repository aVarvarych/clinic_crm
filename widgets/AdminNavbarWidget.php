<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class AdminNavbarWidget extends Widget
{

    public $page;

    public function init()
    {
        parent::init();
        if ($this->page === null) {
            $this->page = 'index';
        }
    }

    public function run(): string
    {
        $html = '';
        $pages = [
            [
                'page' => 'index',
                'active' => $this->page == 'index' ? 'active' : '',
                'url' => Url::toRoute(['admin/index']),
                'label' => 'Початкова'
            ],
            [
                'page' => 'learning',
                'active' => $this->page == 'learning' ? 'active' : '',
                'url' => Url::toRoute(['admin/learning']),
                'label' => 'Список доданих уроків'
            ],
            [
                'page' => 'lesson-a',
                'active' => $this->page == 'lesson-a' ? 'active' : '',
                'url' => Url::toRoute(['admin/lesson-a']),
                'label' => 'Додати урок'
            ],
            [
                'page' => 'news',
                'active' => $this->page == 'news' ? 'active' : '',
                'url' => Url::toRoute(['admin/news']),
                'label' => 'Новини'
            ],
            [
                'page' => 'news-a',
                'active' => $this->page == 'news-a' ? 'active' : '',
                'url' => Url::toRoute(['admin/news-a']),
                'label' => 'Додати новину'
            ],
        ];

        foreach($pages as $page) {
            $html .= <<<html
                <div class="nav flex-column nav-pills">
                    <a class="nav-link {$page['active']}" href="{$page['url']}">{$page['label']}</a>
                </div>
            html;
        }



        return Html::decode($html);
    }
    
}

?>