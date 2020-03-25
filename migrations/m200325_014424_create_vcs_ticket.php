<?php

use yii\db\Migration;

/**
 * Class m200325_014424_create_vcs_ticket
 */
class m200325_014424_create_vcs_ticket extends Migration
{
    private $tableName = '{{%vcs_ticket}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id'          => $this->primaryKey(),
            'code'        => $this->integer()->notNull()->comment('ticket number'),
            'remark'      => $this->text(),
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
        $this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200325_014424_create_vcs_ticket cannot be reverted.\n";

        return false;
    }
    */
}
