<?php

namespace common\modules\user\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $created_at
 * @property integer $status
 * @property integer $updated_at
 * @property string $status_student
 * @property integer $number_of_hours
 * @property string $review_class
 * @property string $first_name
 * @property string $middle_name
 * @property string $guardian_email_address
 * @property string $last_name
 * @property string $nickname
 * @property string $gender
 * @property string $age
 * @property string $contact_number
 * @property string $home_address
 * @property string $school
 * @property string $school_address
 * @property string $guardian_name
 * @property string $relation
 * @property string $guardian_contact_number
 * @property string $date_of_registration
 * @property string $image
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthItem[] $authItemNames
 * @property ClassList[] $classLists
 * @property Course[] $courses
 * @property StudAnswer[] $studAnswers
 * @property Choice[] $choices
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'status', 'updated_at', 'status_student', 'review_class', 'first_name', 'last_name', 'nickname', 'gender', 'age', 'contact_number', 'home_address', 'school', 'school_address', 'date_of_registration'], 'required'],
            [['created_at', 'status', 'updated_at', 'number_of_hours'], 'integer'],
            [['status_student', 'review_class', 'gender'], 'string'],
            [['date_of_registration'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'guardian_email_address', 'home_address', 'school_address', 'image'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['first_name', 'middle_name', 'last_name', 'contact_number', 'guardian_contact_number'], 'string', 'max' => 30],
            [['nickname'], 'string', 'max' => 15],
            [['age'], 'string', 'max' => 3],
            [['school', 'guardian_name'], 'string', 'max' => 100],
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
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'created_at' => 'Created At',
            'status' => 'Status',
            'updated_at' => 'Updated At',
            'status_student' => 'Status Student',
            'number_of_hours' => 'Number Of Hours',
            'review_class' => 'Review Class',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'guardian_email_address' => 'Guardian Email Address',
            'last_name' => 'Last Name',
            'nickname' => 'Nickname',
            'gender' => 'Gender',
            'age' => 'Age',
            'contact_number' => 'Contact Number',
            'home_address' => 'Home Address',
            'school' => 'School',
            'school_address' => 'School Address',
            'guardian_name' => 'Guardian Name',
            'relation' => 'Relation',
            'guardian_contact_number' => 'Guardian Contact Number',
            'date_of_registration' => 'Date Of Registration',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemNames()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'auth_item_name'])->viaTable('auth_assignment', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassLists()
    {
        return $this->hasMany(ClassList::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['id' => 'course_id', 'employee_id' => 'course_employee_id'])->viaTable('class_list', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudAnswers()
    {
        return $this->hasMany(StudAnswer::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChoices()
    {
        return $this->hasMany(Choice::className(), ['id' => 'choice_id', 'question_id' => 'choice_question_id'])->viaTable('stud_answer', ['user_id' => 'id']);
    }
}
