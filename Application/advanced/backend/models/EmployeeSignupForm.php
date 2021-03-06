<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Employee;

/**
 * Signup form
 */
class EmployeeSignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $contact_number;
    public $home_address;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Employee', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Employee', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['first_name', 'required'],
            ['middle_name', 'required'],
            ['last_name', 'required'],
            ['contact_number', 'required'],
            ['home_address', 'required'],

        ];
    }

    /**
     * Signs employee up.
     *
     * @return Employee|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Employee();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        $user->first_name = $this->first_name;
        $user->middle_name = $this->middle_name;
        $user->last_name = $this->last_name;
        $user->contact_number = $this->contact_number;
        $user->home_address = $this->home_address;

        return $user->save() ? $user : null;


    }
}
