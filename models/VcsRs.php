<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vcs_rs".
 *
 * @property int $id
 * @property int $code RS ID
 * @property string|null $remark
 * @property string $create_time
 * @property string $update_time
 * @property string|null $delete_time
 */
class VcsRs extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vcs_rs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'integer'],
            [['remark'], 'string'],
            [['create_time', 'update_time', 'delete_time'], 'safe'],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'code'        => 'Code',
            'remark'      => 'Remark',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'delete_time' => 'Delete Time',
        ];
    }
}
