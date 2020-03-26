<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vcs_path".
 *
 * @property int $id
 * @property int $revision
 * @property string $action action: 0 Added, 1 Deleted, 2 Modified
 * @property string $path
 * @property string $create_time
 * @property string $update_time
 * @property string|null $delete_time
 */
class VcsPath extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vcs_path';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['revision', 'path', 'create_time', 'update_time'], 'required'],
            [['revision'], 'integer'],
            [['action', 'create_time', 'update_time', 'delete_time'], 'safe'],
            [['path'], 'string', 'max' => 255],
            [['action'], 'default', 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'revision'    => 'Revision',
            'action'      => 'Action',
            'path'        => 'Path',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'delete_time' => 'Delete Time',
        ];
    }

    public function transActive($type = null)
    {
        $data = [
            VcsPathConstant::ACTION_ADDED    => 'Added',
            VcsPathConstant::ACTION_DELETED  => 'Deleted',
            VcsPathConstant::ACTION_MODIFIED => 'Modified',
        ];

        if (is_null($type)) {
            return $data;
        } else {
            return $data[$type];
        }
    }
}
