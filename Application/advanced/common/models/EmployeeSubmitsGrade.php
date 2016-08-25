<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee_submits_grade".
 *
 * @property integer $employee_id
 * @property integer $grade_id
 * @property integer $grade_student_id
 * @property integer $grade_course_id
 *
 * @property Employee $employee
 * @property Grade $grade
 */
class EmployeeSubmitsGrade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_submits_grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grade_id', 'grade_student_id', 'grade_course_id'], 'required'],
            [['grade_id', 'grade_student_id', 'grade_course_id'], 'integer'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['grade_id', 'grade_student_id', 'grade_course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grade::className(), 'targetAttribute' => ['grade_id' => 'id', 'grade_student_id' => 'student_id', 'grade_course_id' => 'course_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'grade_id' => 'Grade ID',
            'grade_student_id' => 'Grade Student ID',
            'grade_course_id' => 'Grade Course ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrade()
    {
        return $this->hasOne(Grade::className(), ['id' => 'grade_id', 'student_id' => 'grade_student_id', 'course_id' => 'grade_course_id']);
    }
}
