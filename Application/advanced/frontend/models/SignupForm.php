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
    public $review_class;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $age;
    public $contact_number;
    public $home_address;
    public $image;

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

            ['review_class', 'required'],
            ['first_name', 'required'],
            ['middle_name', 'required'],
            ['last_name', 'required'],
            ['gender', 'required'],
            ['contact_number', 'required'],
            ['home_address', 'required'],
            ['image', 'image'],
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
           
			return null;

        }

         $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->review_class = $this->review_class;
            $user->first_name = $this->first_name;
            $user->middle_name = $this->middle_name;
            $user->last_name = $this->last_name;
            $user->gender = $this->gender;
            $user->contact_number = $this->contact_number;
            $user->home_address = $this->home_address;
            $user->image = $this->image;

            return $user->save() ? $user : null;
    }
}
