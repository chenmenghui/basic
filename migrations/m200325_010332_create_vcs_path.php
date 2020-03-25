<?php

use yii\db\Migration;

/**
 * Class m200325_010332_create_vcs_path
 */
class m200325_010332_create_vcs_path extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vcs_path}}',
            [
                'id'          => $this->primaryKey(),
                'revision'    => $this->integer()->notNull(),
                'path'        => $this->string()->notNull(),
                'create_time' => $this->dateTime()->notNull(),
                'update_time' => $this->dateTime()->notNull(),
                'delete_time' => $this->dateTime(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vcs_path}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200325_010332_create_vcs_path cannot be reverted.\n";

        return false;
    }
    */
}
