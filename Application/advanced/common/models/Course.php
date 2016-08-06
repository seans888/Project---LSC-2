<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $course_name
 * @property string $subject
 *
 * @property EmployeeCreatesCourse[] $employeeCreatesCourses
 * @property Employee[] $employees
 * @property Grade[] $grades
 * @property Schedule[] $schedules
 * @property Task[] $tasks
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_name', 'subject'], 'required'],
            [['course_name', 'subject'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_name' => 'Course Name',
            'subject' => 'Subject',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeCreatesCourses()
    {
        return $this->hasMany(EmployeeCreatesCourse::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['id' => 'employee_id'])->viaTable('employee_creates_course', ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['course_id' => 'id']);
    }
}
