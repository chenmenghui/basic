<?php

namespace app\models;

use common\behavior\SoftDeleteBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "rs".
 *
 * @property int $id
 * @property int $rs
 * @property string|null $comment comment
 * @property string $add_time
 * @property string $update_time
 * @property string|null $delete_time
 */
class Rs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rs';
    }

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
    public function rules()
    {
        return [
            [['rs'], 'integer'],
            [['comment'], 'string'],
            [['add_time', 'update_time', 'delete_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rs'          => 'RS ID',
            'comment'     => 'Comment',
            'add_time'    => 'Add Time',
            'update_time' => 'Update Time',
            'delete_time' => 'Delete Time',
        ];
    }
}
