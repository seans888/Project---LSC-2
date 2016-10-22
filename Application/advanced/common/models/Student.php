<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $age
 * @property string $gender
 * @property string $cell_number
 * @property string $email_add
 * @property string $home_add
 *
 * @property ClassList[] $classLists
 * @property Course[] $courses
 * @property StudAnswer[] $studAnswers
 * @property Choice[] $choices
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'middle_name', 'age', 'gender', 'cell_number', 'email_add', 'home_add'], 'string', 'max' => 45],
            [['first_name'], 'unique'],
            [['last_name'], 'unique'],
            [['age'], 'unique'],
            [['gender'], 'unique'],
            [['home_add'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'age' => 'Age',
            'gender' => 'Gender',
            'cell_number' => 'Cell Number',
            'email_add' => 'Email Add',
            'home_add' => 'Home Add',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassLists()
    {
        return $this->hasMany(ClassList::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['id' => 'course_id', 'employee_id' => 'course_employee_id'])->viaTable('class_list', ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudAnswers()
    {
        return $this->hasMany(StudAnswer::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChoices()
    {
        return $this->hasMany(Choice::className(), ['id' => 'choice_id', 'question_id' => 'choice_question_id'])->viaTable('stud_answer', ['student_id' => 'id']);
    }
}
