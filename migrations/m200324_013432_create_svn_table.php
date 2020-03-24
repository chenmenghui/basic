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
            'code'           => $this->integer()->comment('svn code'),
            'rs'             => $this->integer()->comment('rs id'),
            'patch'          => $this->integer()->comment('patch id'),
            'server'         => $this->string()->comment('代码所属服务器，dev、dev2等'),
            'jenkins_status' => $this->string()->comment('the status in jenkins: 0 commit to svn, 1 update in jenkins, 2 deploy to server'),
            'comment'        => $this->text()->comment('comment'),
            'author'         => $this->string()->comment('作者'),
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
        $this->dropTable('{{%svn}}');
    }
}
