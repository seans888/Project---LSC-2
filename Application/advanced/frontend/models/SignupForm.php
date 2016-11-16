<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status_student;
    public $number_of_hours;
    public $review_class;
    public $first_name;
    public $middle_name;
    public $guardian_email_address;
    public $last_name;
    public $nickname;
    public $gender;
    public $age;
    public $contact_number;
    public $home_address;
    public $school;
    public $school_address;
    public $guardian_name;
    public $relation;
    public $guardian_contact_number;
    public $date_of_registration;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['status_student', 'required'],
            ['number_of_hours', 'required'],
            ['review_class', 'required'],
            ['first_name', 'required'],
            ['middle_name', 'required'],
            ['guardian_email_address', 'required'],
            ['last_name', 'required'],
            ['nickname', 'required'],
            ['gender', 'required'],
            ['age', 'required'],
            ['contact_number', 'required'],
            ['home_address', 'required'],
            ['school', 'required'],
            ['school_address', 'required'],
            ['guardian_name', 'required'],
            ['relation', 'required'],
            ['guardian_contact_number', 'required'],
            ['date_of_registration', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->status_student = $this->status_student;
            $user->number_of_hours = $this->number_of_hours;
            $user->review_class = $this->review_class;
            $user->first_name = $this->first_name;
            $user->middle_name = $this->middle_name;
            $user->guardian_email_address = $this->guardian_email_address;
            $user->last_name = $this->last_name;
            $user->nickname = $this->nickname;
            $user->gender = $this->gender;
            $user->age = $this->age;
            $user->contact_number = $this->contact_number;
            $user->home_address = $this->home_address;
            $user->school = $this->school;
            $user->school_address = $this->school_address;
            $user->guardian_name = $this->guardian_name;
            $user->relation = $this->relation;
            $user->guardian_contact_number = $this->guardian_contact_number;
            $user->date_of_registration = $this->date_of_registration;


            //rbac
            $auth = Yii::$app->authManager;
            $authorRole = $auth->getRole('user');
            $auth->assign($authorRole, $user->getId());

            return $user->save() ? $user : null;


        }

        return null;
    }
}
