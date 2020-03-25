<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vsc_record".
 *
 * @property int $id
 * @property int $revision revision number
 * @property int $rs RS ID
 * @property int $ticket ticket id
 * @property int $server server: 1 dev, 2 dev2, 3 rc, 4 life
 * @property int $jenkins_status the status in jenkins: 0 committed to vcs, 1 updated in jenkins, 2 deployed to server, 3 submitted in next step
 * @property int $next_id the vsc id of next step
 * @property string $author
 * @property string|null $message vcs message
 * @property string|null $comment additional info
 * @property string $create_time
 * @property string $update_time
 * @property string|null $delete_time
 */
class VscRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vsc_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revision', 'create_time', 'update_time'], 'required'],
            [['revision', 'rs', 'ticket', 'server', 'jenkins_status', 'next_id'], 'integer'],
            [['message', 'comment'], 'string'],
            [['create_time', 'update_time', 'delete_time'], 'safe'],
            [['author'], 'string', 'max' => 255],
            ['author', 'default', 'value' => 'valenchen'],
            [['rs', 'ticket', 'server', 'jenkins_status', 'next_id'], 'default', 'value' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'             => 'ID',
            'revision'       => 'Revision',
            'rs'             => 'Rs',
            'ticket'         => 'Ticket',
            'server'         => 'Server',
            'jenkins_status' => 'Jenkins Status',
            'next_id'        => 'Next ID',
            'author'         => 'Author',
            'message'        => 'Message',
            'comment'        => 'Comment',
            'create_time'    => 'Create Time',
            'update_time'    => 'Update Time',
            'delete_time'    => 'Delete Time',
        ];
    }
}