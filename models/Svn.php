<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "svn".
 *
 * @property int $id
 * @property int $code svn code
 * @property int $server server: dev 0, dev2 1, rc 2
 * @property int $rs rs id
 * @property int $patch patch id
 * @property int $jenkins_status the status in jenkins: 0 commit to svn, 1 update in jenkins, 2 deploy to server
 * @property string|null $comment comment
 * @property string $author
 * @property string $add_time
 * @property string $update_time
 * @property string|null $delete_time
 */
class Svn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'svn';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'rs', 'patch'], 'integer'],
            [['comment', 'jenkins_status'], 'string'],
            [['add_time', 'update_time', 'delete_time', 'server'], 'safe'],
            [['author', 'server'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class'      => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['add_time', 'update_time'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time'],
                ],
                'value'      => date('Y-m-d H:i:s'),
            ],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'             => 'ID',
            'code'           => 'Code',
            'server'         => 'Server',
            'rs'             => 'Rs',
            'patch'          => 'Patch',
            'jenkins_status' => 'Jenkins Status',
            'comment'        => 'Comment',
            'author'         => 'Author',
            'add_time'       => 'Add Time',
            'update_time'    => 'Update Time',
            'delete_time'    => 'Delete Time',
        ];
    }
}
