<?php

use yii\db\Migration;

/**
 * Class m200325_010902_create_vcs_record
 */
class m200325_010902_create_vcs_record extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vcs_record}}',
            [
                'id'             => $this->primaryKey(),
                'revision'       => $this->integer()->notNull()->unique(),
                'rs'             => $this->integer()->notNull()->defaultValue(0),
                'ticket'         => $this->integer()->notNull()->defaultValue(0),
                'patch'          => $this->integer()->notNull()->defaultValue(0),
                'server'         => $this->tinyInteger()->notNull()->defaultValue(0)->comment('0 dev, 1 dev2, 2 rc, 3 live'),
                'jenkins_status' => $this->tinyInteger()->notNull()->defaultValue(0)->comment('0 committed to vcs, 1 updated in tool, 2 deployed to server'),
                'next_revision'  => $this->integer()->notNull()->defaultValue(0),
                'author'         => $this->string()->notNull()->defaultValue(''),
                'message'        => $this->text()->comment('commit message of vcs'),
                'remark'         => $this->text(),
                'create_time'    => $this->dateTime()->notNull(),
                'update_time'    => $this->dateTime()->notNull(),
                'delete_time'    => $this->dateTime(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vcs_record}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200325_010902_create_vcs_record cannot be reverted.\n";

        return false;
    }
    */
}
