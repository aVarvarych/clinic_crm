<?php

use yii\db\Migration;

/**
 * Class m220411_115737_lessons
 */
class m220426_211813_news extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string(259)->notNull(),
            'description' => $this->string(259),
            'author' => $this->string(500),
            'updated_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('news');
    }
}
