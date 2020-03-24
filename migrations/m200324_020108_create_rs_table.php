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
            'rs' => $this->integer()->notNull()->defaultValue(0),
            'comment'        => $this->text()->comment('comment'),
            'add_time'       => $this->dateTime()->notNull()->defaultValue('0000-01-01 00:00:00'),
            'update_time'    => $this->dateTime()->notNull()->defaultValue('0000-01-01 00:00:00'),
            'delete_time'    => $this->dateTime()->defaultValue(null),
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
