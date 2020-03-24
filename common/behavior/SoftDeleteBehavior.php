<?php

namespace common\behavior;

use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;

class SoftDeleteBehavior extends Behavior
{
    /**
     * @var string delete time attribute
     */
    public $timeAttribute = false;
    /**
     * @var string status attribute
     */
    public $statusAttribute = "is_deleted";
    /**
     * @var string deleted status attribute
     */
    public $deletedValue = 1;

    /**
     * @var string active status attribute
     */
    public $activeValue = 0;

    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => 'softDelete',
        ];
    }

    /**
     * Set the attribute deleted
     *
     * @param Event $event
     */
    public function softDelete($event)
    {
        $attributes[1] = $this->statusAttribute;
        $_attribute = $attributes[1];
        if ($this->timeAttribute) {
            $this->owner->$_attribute = time();
        } else {
            $this->owner->$attributes[1] = $this->deletedValue;
        }
        // save record
        $this->owner->save(false, $attributes);
        //prevent real delete
        $event->isValid = false;
    }

    /**
     * Restore soft-deleted record
     */
    public function restore()
    {
        $attributes[1] = $this->statusAttribute;
        $this->owner->$attributes[1] = $this->activeValue;
        // save record
        $this->owner->save(false, $attributes);
    }

    /**
     * Force delete from database
     */
    public function forceDelete()
    {
        // store model so that we can detach the behavior and delete as normal
        $model = $this->owner;
        $this->detach();
        $model->delete();
    }
}