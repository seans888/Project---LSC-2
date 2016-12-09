<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "attendance".
 *
 * @property string $status
 * @property integer $class_list_user_id
 * @property integer $class_list_course_id
 * @property integer $schedule_id
 *
 * @property ClassList $classListUser
 * @property Schedule $schedule
 */
class Attendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'class_list_user_id', 'class_list_course_id', 'schedule_id'], 'required'],
            [['status'], 'string'],
            [['class_list_user_id', 'class_list_course_id', 'schedule_id'], 'integer'],
            [['class_list_user_id', 'class_list_course_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClassList::className(), 'targetAttribute' => ['class_list_user_id' => 'user_id', 'class_list_course_id' => 'course_id']],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedule::className(), 'targetAttribute' => ['schedule_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status' => 'Status',
            'class_list_user_id' => 'Class List User ID',
            'class_list_course_id' => 'Class List Course ID',
            'schedule_id' => 'Schedule ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassListUser()
    {
        return $this->hasOne(ClassList::className(), ['user_id' => 'class_list_user_id', 'course_id' => 'class_list_course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(Schedule::className(), ['id' => 'schedule_id']);
    }
}
