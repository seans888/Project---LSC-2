<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $id
 * @property string $subject
 * @property string $day
 * @property string $schedule
 * @property integer $user_id
 *
 * @property Attendance[] $attendances
 * @property ClassList[] $classListUsers
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'day', 'schedule', 'user_id'], 'required'],
            [['day'], 'string'],
            [['user_id'], 'integer'],
            [['subject'], 'string', 'max' => 100],
            [['schedule'], 'string', 'max' => 17],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'day' => 'Day',
            'schedule' => 'Schedule',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['schedule_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassListUsers()
    {
        return $this->hasMany(ClassList::className(), ['user_id' => 'class_list_user_id', 'course_id' => 'class_list_course_id'])->viaTable('attendance', ['schedule_id' => 'id']);
    }
}
