<?php

use yii\db\Migration;

/**
 * Class m200325_010332_create_vsc_path
 */
class m200325_010332_create_vsc_path extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vsc_path}}', [
            'id'          => $this->primaryKey(),
            'revision'    => $this->integer()->notNull(),
            'path'        => $this->string()->notNull(),
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
        echo "m200325_010332_create_vsc_path cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200325_010332_create_vsc_path cannot be reverted.\n";

        return false;
    }
    */
}
