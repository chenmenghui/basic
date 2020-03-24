<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rs}}`.
 */
class m200324_020108_create_rs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rs}}', [
            'id' => $this->primaryKey(),
            'rs' => $this->integer(),
            'comment'        => $this->text()->comment('comment'),
            'add_time'       => $this->dateTime(),
            'update_time'    => $this->dateTime(),
            'delete_time'    => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rs}}');
    }
}
