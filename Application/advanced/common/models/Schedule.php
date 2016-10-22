<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $id
 * @property string $time
 * @property string $day
 *
 * @property Attendance[] $attendances
 * @property ClassList[] $classListCourses
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
            [['time'], 'safe'],
            [['day'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'day' => 'Day',
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
    public function getClassListCourses()
    {
        return $this->hasMany(ClassList::className(), ['course_id' => 'class_list_course_id', 'course_employee_id' => 'class_list_course_employee_id', 'student_id' => 'class_list_student_id'])->viaTable('attendance', ['schedule_id' => 'id']);
    }
}
