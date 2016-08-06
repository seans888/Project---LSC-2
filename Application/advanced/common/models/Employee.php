<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $lastname
 * @property string $employee_position
 * @property string $firstname
 * @property string $middlename
 * @property string $gender
 * @property integer $age
 * @property integer $contact_number
 * @property string $email_address
 *
 * @property EmployeeCreatesCourse[] $employeeCreatesCourses
 * @property Course[] $courses
 * @property EmployeeSubmitsGrade[] $employeeSubmitsGrades
 * @property Grade[] $grades
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'lastname', 'employee_position', 'firstname', 'gender', 'age', 'contact_number', 'email_address'], 'required'],
            [['employee_position', 'gender'], 'string'],
            [['age', 'contact_number'], 'integer'],
            [['username'], 'string', 'max' => 15],
            [['password'], 'string', 'max' => 20],
            [['lastname', 'firstname', 'middlename'], 'string', 'max' => 30],
            [['email_address'], 'string', 'max' => 45],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'lastname' => 'Lastname',
            'employee_position' => 'Employee Position',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'gender' => 'Gender',
            'age' => 'Age',
            'contact_number' => 'Contact Number',
            'email_address' => 'Email Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeCreatesCourses()
    {
        return $this->hasMany(EmployeeCreatesCourse::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['id' => 'course_id'])->viaTable('employee_creates_course', ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeSubmitsGrades()
    {
        return $this->hasMany(EmployeeSubmitsGrade::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['id' => 'grade_id', 'student_id' => 'grade_student_id', 'course_id' => 'grade_course_id'])->viaTable('employee_submits_grade', ['employee_id' => 'id']);
    }
}
