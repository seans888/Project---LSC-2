<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "class_list".
 *
 * @property integer $course_id
 * @property integer $course_employee_id
 * @property integer $student_id
 *
 * @property Attendance[] $attendances
 * @property Schedule[] $schedules
 * @property Course $course
 * @property Student $student
 */
class ClassList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'course_employee_id', 'student_id'], 'required'],
            [['course_id', 'course_employee_id', 'student_id'], 'integer'],
            [['course_id', 'course_employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id', 'course_employee_id' => 'employee_id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'course_employee_id' => 'Course Employee ID',
            'student_id' => 'Student ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['class_list_course_id' => 'course_id', 'class_list_course_employee_id' => 'course_employee_id', 'class_list_student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['id' => 'schedule_id'])->viaTable('attendance', ['class_list_course_id' => 'course_id', 'class_list_course_employee_id' => 'course_employee_id', 'class_list_student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id', 'employee_id' => 'course_employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
}
