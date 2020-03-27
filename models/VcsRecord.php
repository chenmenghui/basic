<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "vsc_record".
 *
 * @property int $id
 * @property int $revision revision number
 * @property int $rs RS ID
 * @property int $ticket ticket id
 * @property int $server server: 1 dev, 2 dev2, 3 rc, 4 life
 * @property int $jenkins_status the status in jenkins: 0 committed to vcs, 1 updated in jenkins, 2 deployed to server, 3 submitted in next step
 * @property int $next_revision the vsc id of next step
 * @property string $author
 * @property string|null $message vcs message
 * @property string $create_time
 * @property string $update_time
 * @property string|null $delete_time
 * @property string $remark
 * @property array $path vcs_path
 */
class VcsRecord extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vcs_record}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revision'], 'required'],
            [['revision', 'rs', 'ticket', 'server', 'jenkins_status', 'next_revision'], 'integer'],
            [['message', 'remark'], 'string'],
            [['create_time', 'update_time', 'delete_time'], 'safe'],
            [['author'], 'string', 'max' => 255],
            [['author'], 'default', 'value' => 'valenchen'],
            [['rs', 'ticket', 'server', 'jenkins_status', 'next_revision'], 'default', 'value' => 0],
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
            'next_revision'  => 'Next Revision',
            'author'         => 'Author',
            'message'        => 'Message',
            'remark'         => 'Remark',
            'create_time'    => 'Create Time',
            'update_time'    => 'Update Time',
            'delete_time'    => 'Delete Time',
        ];
    }

    /**
     * @param Model $model
     * @return \yii\db\ActiveQuery
     */
    public function getPath(Model $model)
    {
        return $this->hasMany(VcsPath::class, ['revision' => 'revision']);
    }
}
