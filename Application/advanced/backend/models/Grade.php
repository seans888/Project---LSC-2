<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property integer $id
 * @property string $date
 * @property string $subject
 * @property integer $homework
 * @property integer $exercise
 * @property integer $quiz
 * @property integer $grade_final
 * @property string $attendance
 * @property integer $student_id
 * @property integer $course_id
 *
 * @property EmployeeSubmitsGrade[] $employeeSubmitsGrades
 * @property Employee[] $employees
 * @property Course $course
 * @property Student $student
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['subject', 'attendance', 'student_id', 'course_id'], 'required'],
            [['homework', 'exercise', 'quiz', 'grade_final', 'student_id', 'course_id'], 'integer'],
            [['subject'], 'string', 'max' => 200],
            [['attendance'], 'string', 'max' => 7],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'subject' => 'Subject',
            'homework' => 'Homework',
            'exercise' => 'Exercise',
            'quiz' => 'Quiz',
            'grade_final' => 'Grade Final',
            'attendance' => 'Attendance',
            'student_id' => 'Student ID',
            'course_id' => 'Course ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeSubmitsGrades()
    {
        return $this->hasMany(EmployeeSubmitsGrade::className(), ['grade_id' => 'id', 'grade_student_id' => 'student_id', 'grade_course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['id' => 'employee_id'])->viaTable('employee_submits_grade', ['grade_id' => 'id', 'grade_student_id' => 'student_id', 'grade_course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
}
