<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ticket}}`.
 */
class m200324_021655_create_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ticket}}', [
            'id'          => $this->primaryKey(),
            'rs'          => $this->integer()->comment('rs id'),
            'comment'     => $this->text()->comment('comment'),
            'add_time'    => $this->dateTime(),
            'update_time' => $this->dateTime(),
            'delete_time' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ticket}}');
    }
}
