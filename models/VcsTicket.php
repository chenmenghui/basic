<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vcs_ticket".
 *
 * @property int $id
 * @property int $code ticket number
 * @property string|null $remark
 * @property string $create_time
 * @property string $update_time
 * @property string|null $delete_time
 */
class VcsTicket extends \yii\db\ActiveRecord
{
    use base;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vcs_ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'create_time', 'update_time'], 'required'],
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
            'id' => 'ID',
            'code' => 'Code',
            'remark' => 'Remark',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'delete_time' => 'Delete Time',
        ];
    }
}
