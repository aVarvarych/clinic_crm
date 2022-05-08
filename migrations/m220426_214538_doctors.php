<?php

use yii\db\Migration;

/**
 * Class m220411_115737_lessons
 */
class m220426_214538_doctors extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('doctors', [
            'id' => $this->primaryKey(),
            'name' => $this->string(259)->notNull(),
            'position' => $this->string(259),
            'email' => $this->string(500),
            'phone' => $this->string(500),
            'user_id' => $this->integer(10),
            'updated_at' => $this->string()->notNull(),
            'created_at' => $this->string()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('doctors');
    }
}
