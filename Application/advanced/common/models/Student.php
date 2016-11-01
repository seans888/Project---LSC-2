<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $status
 * @property integer $number_of_hours
 * @property string $review_class
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property string $nickname
 * @property string $gender
 * @property integer $age
 * @property string $email_address
 * @property string $contact_number
 * @property string $address
 * @property string $school
 * @property string $school_address
 * @property string $guardian_name
 * @property string $relation
 * @property string $guardian_contact_number
 * @property string $guardian_email_address
 * @property string $date_of_registration
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
            [['status', 'review_class', 'last_name', 'first_name', 'nickname', 'gender', 'age', 'email_address', 'contact_number', 'address', 'school', 'school_address', 'date_of_registration'], 'required'],
            [['status', 'review_class', 'gender'], 'string'],
            [['number_of_hours', 'age'], 'integer'],
            [['date_of_registration'], 'safe'],
            [['last_name', 'first_name', 'middle_name', 'contact_number', 'guardian_contact_number'], 'string', 'max' => 30],
            [['nickname'], 'string', 'max' => 15],
            [['email_address', 'school', 'guardian_name'], 'string', 'max' => 100],
            [['address', 'school_address', 'guardian_email_address'], 'string', 'max' => 255],
            [['relation'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'number_of_hours' => 'Number Of Hours',
            'review_class' => 'Review Class',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'nickname' => 'Nickname',
            'gender' => 'Gender',
            'age' => 'Age',
            'email_address' => 'Email Address',
            'contact_number' => 'Contact Number',
            'address' => 'Address',
            'school' => 'School',
            'school_address' => 'School Address',
            'guardian_name' => 'Guardian Name',
            'relation' => 'Relation',
            'guardian_contact_number' => 'Guardian Contact Number',
            'guardian_email_address' => 'Guardian Email Address',
            'date_of_registration' => 'Date Of Registration',
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
