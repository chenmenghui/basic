<?php

use yii\db\Migration;

/**
 * Class m200325_010902_create_vsc_record
 */
class m200325_010902_create_vsc_record extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vsc_record}}', [
            'id'             => $this->primaryKey(),
            'revision'       => $this->integer()->notNull(),
            'rs'             => $this->integer()->notNull()->defaultValue(0),
            'ticket'         => $this->integer()->notNull()->defaultValue(0),
            'server'         => $this->tinyInteger()->notNull()->defaultValue(0),
            'jenkins_status' => $this->tinyInteger()->notNull()->defaultValue(0),
            'next_revision'  => $this->integer()->notNull()->defaultValue(0),
            'author'         => $this->string()->notNull()->defaultValue(''),
            'message'        => $this->text(),
            'comment'        => $this->text(),
            'create_time' => $this->dateTime()->notNull(),
            'update_time' => $this->dateTime()->notNull(),
            'delete_time' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200325_010902_create_vsc_record cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200325_010902_create_vsc_record cannot be reverted.\n";

        return false;
    }
    */
}
