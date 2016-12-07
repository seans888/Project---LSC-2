<?php

namespace backend\modules\employee\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $contact_number
 * @property string $home_address
 * @property string $image
 *
 * @property AnnCalendar[] $annCalendars
 * @property Course[] $courses
 */
class Employee extends ActiveRecord
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
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name', 'gender', 'age', 'home_address'], 'required'],
            [['gender'], 'string'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'home_address', 'image'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['first_name', 'middle_name', 'last_name', 'contact_number'], 'string', 'max' => 30],
            [['age'], 'string', 'max' => 3],
            [['created_at'], 'unique'],
            [['image'], 'safe', 'on' => 'update-image'],
            [['image'], 'file', 'extensions' => 'png, jpg, gif, jpeg'] //validator for image - file for image
        ];
    }

    public function scenarios(){
        $scenario = parent::scenarios();
        $scenario['update-image'] = ['image'];
        return $scenario;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Authentication Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Your email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'contact_number' => 'Contact Number',
            'home_address' => 'Home Address',
            'image' => 'Profile Picture',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnnCalendars()
    {
        return $this->hasMany(AnnCalendar::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['employee_id' => 'id']);
    }
}
