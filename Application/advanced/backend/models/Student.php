<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $lastname
 * @property string $firstname
 * @property string $middlename
 * @property string $nickname
 * @property string $gender
 * @property integer $age
 * @property string $email_address
 * @property integer $contact_number
 * @property string $address
 * @property string $school
 * @property string $school_address
 * @property string $guardian_name
 * @property string $date_of_registration
 *
 * @property Grade[] $grades
 * @property Schedule[] $schedules
 * @property Task[] $tasks
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
            [['username', 'password', 'lastname', 'firstname', 'nickname', 'gender', 'age', 'contact_number', 'address', 'school', 'school_address', 'guardian_name', 'date_of_registration'], 'required'],
            [['gender'], 'string'],
            [['age', 'contact_number'], 'integer'],
            [['date_of_registration'], 'safe'],
            [['username', 'nickname'], 'string', 'max' => 15],
            [['password'], 'string', 'max' => 20],
            [['lastname', 'firstname', 'middlename'], 'string', 'max' => 30],
            [['email_address', 'school'], 'string', 'max' => 45],
            [['address', 'school_address'], 'string', 'max' => 50],
            [['guardian_name'], 'string', 'max' => 40],
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
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'nickname' => 'Nickname',
            'gender' => 'Gender',
            'age' => 'Age',
            'email_address' => 'Email Address',
            'contact_number' => 'Contact Number',
            'address' => 'Address',
            'school' => 'School',
            'school_address' => 'School Address',
            'guardian_name' => 'Guardian Name',
            'date_of_registration' => 'Date Of Registration',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['student_id' => 'id']);
    }
}
