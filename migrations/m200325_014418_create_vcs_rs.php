<?php

use yii\db\Migration;

/**
 * Class m200325_014418_create_vcs_rs
 */
class m200325_014418_create_vcs_rs extends Migration
{
    private $tableName = '{{%vcs_rs}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id'          => $this->primaryKey(),
            'code'        => $this->integer()->notNull()->unique()->comment('RS ID'),
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
        echo "m200325_014418_create_vcs_rs cannot be reverted.\n";

        return false;
    }
    */
}
