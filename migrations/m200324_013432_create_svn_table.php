<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%svn}}`.
 */
class m200324_013432_create_svn_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%svn}}', [
            'id'             => $this->primaryKey(),
            'code'           => $this->integer()->notNull()->defaultValue(0)->comment('svn code'),
            'server'         => $this->tinyInteger()->notNull()->defaultValue(0)->comment('server: dev 0, dev2 1, rc 2'),
            'rs'             => $this->integer()->notNull()->defaultValue(0)->comment('rs id'),
            'patch'          => $this->integer()->notNull()->defaultValue(0)->comment('patch id'),
            'jenkins_status' => $this->tinyInteger()->notNull()->defaultValue(0)->comment('the status in jenkins: 0 commit to svn, 1 update in jenkins, 2 deploy to server'),
            'comment'        => $this->text()->comment('comment'),
            'author'         => $this->string()->notNull()->defaultValue('valenchen'),
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
        $this->dropTable('{{%svn}}');
    }
}
